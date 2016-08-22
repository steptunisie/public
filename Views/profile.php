<?php

echo '<img src="" style="float: right;margin-top: 33px;" />';
                          if($users['0']['valid']==0){
                              
                              echo "valider votre compt";
                              
                              
                          }
                        //var_dump($users);
                          echo 'Hi ' . $users['0']['lname'] . ', Thanks for Registering! [<a href="' . $redirect_uri . '?logout=1" >Log Out</a>]';
                        //print user details
                        echo '<pre>';

                        echo '</pre>';
    

