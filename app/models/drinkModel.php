<?php

require_once('Model.php');

class drinkModel extends Model {

    public function getDrink($id) {
        $stmt = $this->getDataById('drinks', $id);
        $result = null;

        while ($data = $stmt->fetch()) {
            $result = $data['desc'];
        }
        return $result;
    }

    public function getDrinks() {
        $stmt = $this->getAllData('drinks');
        $result = null;

        while ($data = $stmt->fetch()) {
            $result[$data['id']] = $data['desc'];
        }

        return $result;
    }

    public function getComments($name) {
        $stmt = $this->getDataByName('comments', $name);
        $result = null;

        while ($data = $stmt->fetch()) {
            $result[] = [$data['author'], $data['date'], $data['comment']];
        }

        return $result;
    }

    public function getDescriptions() {
        $stmt = $this->getAllData('descriptions');
        $result = null;

        while ($data = $stmt->fetch()) {
            $result[$data['id']] = $data['desc'];
        }

        return $result;
    }
}

?>