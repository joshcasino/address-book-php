<?php
  class Contact
  {
    private $name;
    private $address;
    private $phone;
    {
      $this->name = $name;
      $this->address = $address;
      $this->phone = $phone;
    }

    function getname()
    {
      return $this->name;
    }

    function setname($new_name)
    {
      $this->name = $new_name;
    }

    function getaddress()
    {
      return $this->address;
    }

    function setaddress($new_address)
    {
      $this->address = $new_address;
    }

    function getphone()
    {
      return $this->phone;
    }

    function setPhoneNumber($new_phone)
    {
      $this->PhoneNumber = $new_phone;
    }

    static function clear()
    {
      $_SESSION['contacts'] = array();
    }
  }
?>
