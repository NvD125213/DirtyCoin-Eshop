<?php 
     function getConfigValueSetting($name) {
        $settings = App\Models\tb_configurations::where('name', $name)->first();
        if(!empty($settings)) {
            return $settings->value;
        }
        return null;
     }
?>