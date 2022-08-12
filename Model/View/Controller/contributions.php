<?php

class Contributions extends Contributors
{

    public $date;
    public $contributor_id;
    public $amount;
    public $payment_method;
    public $status;
    public $table = "contributions";
    public $result;


    public function contributionInfo($condition = "", $field = "*", $column = "")
    {
        return $this->lookUp($this->table, $field, $condition, $column);
    }

    public function validateContribution()
    {
        if (Functions::checkEmptyInput([$this->date, $this->amount, $this->payment_method])) {
            Functions::redirect("View/view.php", "error", "None of the fields must be empty!");
        }

        if (($this->isExists("date = '$this->date'"))  || ($this->isExists("contributor_id = '$this->contributor_id'")) || ($this->isExists("amount = '$this->amount'")) || ($this->isExists("payment_method='$this->payment_method'"))) {
            Functions::redirect("View/view.php", "error", "This entry already exists!");
        }

        Functions::redirect("View/view.php", "success", "Saved successfully!");
    }
    public function processContribution($date, $contributor_id, $amount, $payment_method)
    {
        $this->date = $this->escape($date);
        $this->contributor_id = $this->escape($contributor_id);
        $this->amount = $this->escape($amount);
        $this->payment_method = $this->escape($payment_method);

        // $this->validateContribution();
        $this->saveContribution();
    }

    public function saveContribution()
    {

        echo  "date = '$this->date', contributor_id = '$this->contributor_id', amount = '$this->amount', payment_method = '$this->payment_method'";
        exit;
        $this->save($this->table, "date = '$this->date', contributor_id = '$this->contributor_id', amount = '$this->amount', payment_method = '$this->payment_method'");
    }
}