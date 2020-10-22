<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Master\Role;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class OptionController extends Controller
{
    //
    function role($id_level, $route)
    {
        $role = Role::join('menu', 'menu_role.id_menu', 'menu.id_menu')
                ->select('access', 'input', 'modify', 'delete')
                ->where('id_level', $id_level)
                ->where('route', $route)
                ->where('menu_role.is_deleted', 'N')
                ->first();
        return $role;
    }

    function sendMail($to, $headline, $related_article)
    {
        // return view('dashboard.pages.subscriber.email.index', compact('to', 'headline', 'related_article'));   
        
        $mail = new PHPMailer(true);                              
        try {
            $mail->isSMTP();                                      
            $mail->Host = 'smtp.googlemail.com';                 
            $mail->SMTPAuth = true;                               
            $mail->Username = 'pradanadigital.evolution@gmail.com';                
            $mail->Password = 'Yuppentek2';                           
            $mail->SMTPSecure = 'tls';                            
            $mail->Port = 587;                                    
    
            $mail->setFrom("pradanadigital.evolution@gmail.com", "Digidana.id");
    
            $mail->addAddress($to, 'User');
    
            //Content
            $mail->isHTML(true);
            $mail->Subject = $headline->title_preview_post;
            $mail->Body    = view('dashboard.pages.subscriber.email.index', compact('to', 'headline', 'related_article'));         
            $mail->send();
            // echo 'Message Send';

            // return view('layouts.mail.register', compact('foto', 'member', 'name', 'username', 'password'));
        }catch (Exception $e){
            echo 'Message could not be sent.'.$e;
        }
    }

}
