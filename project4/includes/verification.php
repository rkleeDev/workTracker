<?php
    class verification {

        private $phone;

        public function verify() {
            $phregex = '/^\(?[2-9]\d{2}\)?[-\.\s]\d{3}[-\.\s]\d{4}([-\.\s]\d{4})?$/';
            if (!preg_match($phregex, $phone))
            {
                return echo '<p class="error">Please enter a valid phone number.</p>';
                //break;
            }

        }
    }
