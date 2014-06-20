<?php

class tx_tcdirectmail_target_csvlist extends tx_tcdirectmail_target_array{
   function init() {
       $this->data = array();
       if ($this->fields['csvfields'] && $this->fields['csvseparator'] && $this->fields['csvfields']) {
      $sepchar = $this->fields['csvseparator']?$this->fields['csvseparator']:',';
           $fields = array_map('trim', explode ($sepchar, $this->fields['csvfields']));
           $lines = explode ("\n", $this->fields['csvvalues']);
      foreach ($lines as $line) {
          $row = array();
              $values = explode($sepchar, $line);
              foreach ($values as $i => $value) {
              $row[$fields[$i]] = trim($value);
          }
              $this->data[] = $row;
      }      
       }
   }
}


