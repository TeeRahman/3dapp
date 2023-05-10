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

<!-- 
1. This is an example of a model which is specific in providing data for each drink. The model will utilise the inherited CRUD methods from Model Class to craft specific methods appropriate for the Drinks controller.
2. This class now enables the 'Drinks' controller to interact with the database by just creating an instance. 
3. The most common use of this model was to obtain drinks data such as model descriptions and comments. 
-->

<!-- QA CHECK 09/05 -->