<?php


class Contributors extends Database
{

    public $name;
    public $phone;
    public $email;
    public $address;
    public $gender;
    public $amount;
    public $status;
    public $table = "contributors";
    public $result;

    public function contributorInfo($conditions = "", $field = "*", $column = "")
    {
        return $this->lookUp($this->table, $field, $conditions, $column);
    }

    public function countUserRows($conditions)
    {
        return $this->countRows($this->table, "*", $conditions);
    }

    public function isExists($conditions)
    {
        $rlt = $this->countUserRows($conditions);
        if ($rlt > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function singleContributorInfo($id)
    {
        $this->result = $this->contributorInfo("id = '$id'");
        $this->name = $this->result['name'];
        $this->phone = $this->result['phone'];
        $this->email = $this->result['email'];
        $this->address = $this->result['address'];
        $this->gender = $this->result['gender'];
        $this->amount = $this->result['amount'];
        $this->status = $this->result['status'];
    }

    public function getContributorsGender($condition)
    {
        return $this->contributorInfo("gender = '$condition'");
    }

    public function getContributorsAmount($condition)
    {
        return $this->contributorInfo("amount = '$condition'");
    }

    public function validateContributor()
    {
        if (Functions::checkEmptyInput([$this->name, $this->phone, $this->email, $this->address, $this->gender, $this->amount])) {
            Functions::redirect("View/index.php", "error", "None of the fields must be empty!");
        }

        if (is_numeric($this->name)) {
            Functions::redirect("View/index.php", "error", "Name or type must be in text only!");
        }

        if (!is_numeric($this->phone)) {
            Functions::redirect("View/index.php", "error", "Phone must not contain letters!");
        }


        if (($this->isExists("name = '$this->name'"))) {
            Functions::redirect("View/index.php", "error", "This name already exists!");
        }
    }

    public function processContributor($name, $phone, $email, $address, $gender, $amount)
    {
        $this->name = $this->escape($name);
        $this->phone = $this->escape($phone);
        $this->email = $this->escape($email);
        $this->address = $this->escape($address);
        $this->gender = $this->escape($gender);
        $this->amount = $this->escape($amount);
        $this->validateContributor();

        $this->saveContributor();
    }

    public function saveContributor()
    {

        $this->save($this->table, "name = '$this->name', phone = '$this->phone', email = '$this->email', address = '$this->address', gender = '$this->gender', amount = '$this->amount'");
    }
}