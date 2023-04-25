<?php
    function isBlank($value) {
      return !isset($value) || trim($value) === '';
    }

    function hasPresence($value) {
      return !isBlank($value);
    }

    function hasLengthGreater($value, $min) {
      $length = strlen($value);
      return $length > $min;
    }

    function hasLengthLess($value, $max) {
      $length = strlen($value);
      return $length < $max;
    }

    function hasLengthExact($value, $exact) {
      $length = strlen($value);
      return $length == $exact;
    }

    function hasLength($value, $options) {
      if(isset($options['min']) && !hasLengthGreater($value, $options['min'] - 1)) {
        return false;
      } elseif(isset($options['max']) && !hasLengthLess($value, $options['max'] + 1)) {
        return false;
      } elseif(isset($options['exact']) && !hasLengthExact($value, $options['exact'])) {
        return false;
      } else {
        return true;
      }
    }
  
    function hasInclusion($value, $set) {
      return in_array($value, $set);
    }

    function hasExclusion($value, $set) {
      return !in_array($value, $set);
    }

    function hasString($value, $required_string) {
      return strpos($value, $required_string) !== false;
    }

    function hasValidEmail($value) {
      $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
      return preg_match($email_regex, $value) === 1;
    }
  
?>
