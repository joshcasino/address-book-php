<?php
    class Contact
    {
        private $name;
        private $address;
        private $phone;

        function __construct($name, $address, $phone)
        {
            $this->name = $name;
            $this->address = $address;
            $this->phone = $phone;
        }

        function get_name()
        {
            return $this->name;
        }

        function set_name()
        {
            return $this->name;
        }

        function get_address()
        {
            return $this->address;
        }

        function set_address()
        {
            return $this->address;
        }

        function get_phone()
        {
            return $this->phone;
        }

        function set_phone()
        {
            return $this->phone;
        }

        static function getAll()
        {
            return $_SESSION['list_of_contacts'];
        }

        function save()
        {
            array($_SESSION['list_of_contacts'], $this);
        }

        function loopContacts()
        {
            $contacts_matching_search = array();
            foreach ($_SESSION['list_of_contacts'] as $car) {
                if ($car->get_name() < $_POST["name"] && $car->get_address() < $_POST["address"]) {
                    array_push($contacts_matching_search, $contact);
                }
            }
        }
    }
?>
