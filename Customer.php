<?php


class Customer{
    protected $name,
    $surname,
    $type,
    $phone,
    $email,
    $createOrRebuild,
    $siteLangage,
    $siteDesign,
    $siteVisitors,
    $siteFollowing,
    $id;

    var $finalPrice;



    //setters

    public function setName($name){
        if(is_string($name) && !empty($name)){
            $this->name=$name;
        }
    }

    public function setSurName($surname){
        if(is_string($surname) && !empty($surname)){
            $this->surname=$surname;
        }
    }

    public function setPhone($phone){
        if(!empty($phone)){
            $this->phone=$phone;
        }
    }

    public function setEmail($email){       
        if(!empty($email)){
            $this->email=$email;
        }
    }

    public function setType($type){
            $this->type=$type;
    }

    public function setCreateOrRebuild($createOrRebuild){
        if(is_numeric($createOrRebuild)){
            $this->createOrRebuild=$createOrRebuild;
        }else{
            $this->sendError('createOrRebuild',$createOrRebuild);
        }
    }

    public function setSiteLangage($siteLangage){
        if(is_numeric($siteLangage)){
            $this->siteLangage=$siteLangage;
        }else{
            $this->sendError('siteLangage',$siteLangage);
        }
    }

    public function setSiteDesign($siteDesign){
        if(is_numeric($siteDesign)){
            $this->siteDesign=$siteDesign;
        }else{
            $this->sendError('siteDesign',$siteDesign);
        }
    }

    public function setSiteVisitors($siteVisitors){
        if(is_numeric($siteVisitors)){
            $this->siteVisitors=$siteVisitors;
        }else{
            $this->sendError('siteVisitors',$siteVisitors);
        }
    }

    public function setSiteFollowing($siteFollowing){
        if(is_numeric($siteFollowing)){
            $this->siteFollowing=$siteFollowing;
        }else{
            $this->sendError('siteFollowing',$siteFollowing);
        }
    }

//getters
    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getSurName(){
        return $this->surname;
    }

    public function getType(){
        return $this->type;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getCreateOrRebuild(){
        return $this->createOrRebuild;
    }

    public function getSiteLangage(){
        return $this->siteLangage;
    }

    public function getSiteDesign(){
        return $this->siteDesign;
    }

    public function getGraphicCharter(){
        return $this->siteVisitors;
    }

    public function getSiteTech(){
        return $this->siteTech;
    }

    //hydratation of current entity
    public function hydrate($name,$surname,$email,$phone,$type,$createOrRebuild,$siteLangage,$siteDesign,$siteVisitors,$siteFollowing){
        try{
            $this->setName($name);
            $this->setSurName($surname);
            $this->setEmail($email);
            $this->setPhone(intval($phone));
            $this->setType(intval($type));
            $this->setCreateOrRebuild(intval($createOrRebuild));
            $this->setSiteLangage(intval($siteLangage));
            $this->setSiteDesign(intval($siteDesign));
            $this->setSiteVisitors(intval($siteVisitors));
            $this->setSiteFollowing(intval($siteFollowing));
        }
        catch(Exception $e){
            echo "<script>M.toast({html:'".$e->getMessage()."'});</script>"; 
        }

    }

    //get entity from database
    public function retrieve($surname,$email,$phone){
        global $wpdb;
        $query="SELECT * FROM customer
        WHERE surname='".$surname."'AND email='".$email."' AND phone='".$phone."'";
        $rowSelect=$wpdb->get_row($query,ARRAY_A);

        $this->hydrate($rowSelect['name'], $rowSelect['surname'],$rowSelect['email'],$rowSelect['phone'],$rowSelect['type'],$rowSelect['createOrRebuild'],$rowSelect['siteLangage'],$rowSelect['siteDesign'],$rowSelect['siteVisitors'],$rowSelect['siteFollowing']);
    }

    //record entity in database
    public function persist(){
        global $wpdb;
        //we insert in DB, through the db object, the datas we got from hydratation
        $wpdb->insert(
            'customer',
            array(
                'name'=>$this->name,
                'surname'=>$this->surname,
                'type'=>$this->type,
                'createOrRebuild'=>$this->createOrRebuild,
                'siteLangage'=>$this->siteLangage,
                'siteDesign'=>$this->siteDesign,
                'siteVisitors'=>$this->siteVisitors,
                'siteFollowing'=>$this->siteFollowing,
                'email'=>$this->email,
                'phone'=>$this->phone,
                'price'=>NULL
            ),
            array("%s","%s","%s","%d","%d","%d","%d","%d","%s","%s")
        );
        //we activate error detection 


    }

    public function addPrice($surname, $email, $phone, $price){
        global $wpdb;
        //we insert in DB, through the db object, the datas we got from hydratation
        $wpdb->update(
            'customer',
            array(
                'name'=>$this->name,
                'surname'=>$this->surname,
                'type'=>$this->type,
                'createOrRebuild'=>$this->createOrRebuild,
                'siteLangage'=>$this->siteLangage,
                'siteDesign'=>$this->siteDesign,
                'siteVisitors'=>$this->siteVisitors,
                'siteFollowing'=>$this->siteFollowing,
                'email'=>$this->email,
                'phone'=>$this->phone,
                'price'=>$price
            ),
            array(
                'name'=>$this->name,
                'surname'=>$surname,
                'type'=>$this->type,
                'createOrRebuild'=>$this->createOrRebuild,
                'siteLangage'=>$this->siteLangage,
                'siteDesign'=>$this->siteDesign,
                'siteVisitors'=>$this->siteVisitors,
                'siteFollowing'=>$this->siteFollowing,
                'email'=>$email,
                'phone'=>$phone,
                'price'=>NULL
            ),
            array("%s","%s","%s","%d","%d","%d","%d","%d","%s","%s","%s"),
            array("%s","%s","%s","%d","%d","%d","%d","%d","%s","%s")
        );
        //we activate error detection 
        

    }

    public function checkPrice(){
        global $wpdb;
        $tempPriceValueFull=0;
        //the table of prices is loaded as an array of object (less SQL queries, will be faster)
        $rowSelect=$wpdb->get_results("SELECT * FROM priceRef");
        //then we compare our customer values with the table
        foreach($this as $key=>$value){
            if(is_int($value)){
                $tempPriceValueFull+=$this->priceFind($rowSelect,$key,$value);
            };
        };
        $this->finalPrice=$tempPriceValueFull;
        $this->addPrice($this->surname, $this->email, $this->phone,$this->finalPrice);
    }
    //this checks if it can find in the table array an object that has the properties we want.
    //if yes, it adds the price property of the object to the customer
    public function priceFind($rowSelect,$originData,$originValue){
        $tempPriceValueRow=0;
        foreach($rowSelect as $priceObject){
            if($priceObject->service==$originData && $priceObject->indexValue==$originValue){
                $tempPriceValueRow+= intval($priceObject->price);
            }
        };
        return $tempPriceValueRow;
    }

    public function sendMail($recipient){
        $subject="Un nouveau devis est arrivé.";
        $message="Le client ".$this->surname." ".$this->name." est de type:".$this->type."et souhaite un site pour ".$this->finalPrice." euros. ";
        wp_mail($recipient, $subject,$message);
        
    }

    public function sendError($stringVal,$val){
        throw new Exception('Une valeur est vide ou incorrecte: '.$stringVal.' '.$val);
    }

}
?>