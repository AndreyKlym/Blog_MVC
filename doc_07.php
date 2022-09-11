<?php

function fun1(){
    // fun2();
    try{
        fun2();
    } catch (Exception $e) {
        echo 'Было поймано исключение: ' . $e->getMessage();
    }
    echo 'А теперь выполниться этот код'. '<br>';
}

function fun2(){
    // try{
    //     fun3();
    // } catch (Exception $e) {
    //     echo 'Было поймано исключение: ' . $e->getMessage();
    // }
    fun3();
}

function fun3(){
    throw new Exception('Ошибка подключения к БД  <br>'); 

    echo 'А этот код не выполниться!!!';
}

fun1();