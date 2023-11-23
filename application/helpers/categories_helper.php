<?php
    if(!function_exists('categories_income_expense'))
    {
        function categories_income_expense($type = 0){
            $CI = &get_instance();
            $CI->load->model('CategoriesIncomeExpensesModel');
            return $CI->CategoriesIncomeExpensesModel->getAll($type);
        }
    }