<?php
class item
{
    public $_idItem;
    public $_price;
    public $_title;
    public $_subject;
    public $_background;
    public $_rate;
    public $_countRate;
    public $_mysqli;
    public $_category;
    function item($mysqli)
    {
        $this->_mysqli = $mysqli;
    }
    function setItem($idItem)
    {
        $result = $this->_mysqli->query("select *from items where idItem=$idItem");
        if (!$result) 
        {
        $this->_title =  0;
        $this->_subject =  0;
        $this->_price =  0;
        $this->_idItem =  0;
        $this->_background =  0;        
        $this->_countRate =  0;
        $this->_rate =  0;
        $this->_category =  0;
        }
        else
        {
            $result = $result->fetch_array();
            $this->_title =  $result["title"];
            $this->_subject =  $result["subject"];
            $this->_price =  $result["price"];
            $this->_idItem =  $result["idItem"];
            $this->_background =  $result["background"];
            $this->_countRate =  $result["countRate"];
            $this->_rate =  $result["rate"];
            $this->_category=  $result["category"];
        }
        return $this;
    }
    function getTitle()
    {
        return $this->_title;
    }
    function getPrice()
    {
        return $this->_price - 0.01;
    }
    function getSubject()
    {
        return $this->_subject;
    }
    function getBackground()
    {
        return $this->_background;
    }
    function getCategory()
    {
        return $this->_category;
    }
    function getRate()
    {
        if($this->_countRate ==null or $this->_countRate<5)
        $this->_countRate =5;
        if($this->_rate ==null or $this->_rate<1)
        $this->_rate =1;
       $count = $this->_countRate / $this->_rate;
        if($count >= 4.5)
            $count = 5;
            else if($count >= 4 && $count <= 4.5)
            $count = 4;
            else if($count >= 3.5 && $count <= 4)
            $count = 4;
            else if($count >= 3 && $count <= 4)
            $count = 3;
            else if($count >= 2.5 && $count <= 3)
            $count = 3;
            else
            $count = 2;
            return $count;
            

    }
    function getId()
    {
        return $this->_idItem;
    }
    function getCountRate()
    {
        return $this->_countRate;
    }

}