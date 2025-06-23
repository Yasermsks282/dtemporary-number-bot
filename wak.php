<?php 

if(isset($update)):
        $channel ="-1002381921851";
    @$a = explode("\n",$text);
    @$home=[[["text"=>"القائمة الرئيسية","callback_data"=>"home"]]];
    @$bak=[[["text"=>"رجوع 🔙","callback_data"=>"home"]]];
    @$cancel=[[["text"=>"إلغاء ❌","callback_data"=>"home"]]];
    if ( $text == "/admin" ):
        send(
            "اهلا وسهلا بك عزيزي المطور". 
            "الاوامر امامك اختر ماتريد",
            [
			[["text" => " تقييد عضو 🔧", "callback_data" => "ban"]],
                [["text" => "فك تقييد عضو 🔧", "callback_data" => "unban"]],                               
                [["text"=>"اضافة رصيد 💲","callback_data"=>"addpoint"],                              
                ],                               
                
            ]
        );
        $info[$chat_id]['mode']=null;
        save($info);
        exit; 
        elseif ( $data == "home2" ):
        edit(
            "اهلا وسهلا بك عزيزي المطور". 
            "الاوامر امامك اختر ماتريد",
            [
                
                [["text" => " تقييد عضو 🔧", "callback_data" => "ban"]],
                [["text" => "فك تقييد عضو 🔧", "callback_data" => "unban"]],                               
                [["text"=>"اضافة رصيد 💲","callback_data"=>"addpoint"],                              
                ], 
            ]
        );
        $info[$chat_id]['mode']=null;
        save($info);
        exit;
        elseif($data == "addpoint") :
        edit("✅ | يمكنك الأن تحويل رصيد من حسابك الئ حساب شخص أخر بشكل مباشر .
👨‍✈️ | عمولة التحويل:  0%.
⚠️ | أقل مبلغ للتحويل:  20.00✅.\n
✳️ | هل تريد تحويل رصيد الئ حساب أخر؟",  [
           [
                ["text"=>"تأكيد ✅","callback_data"=>"continue2"],
                ["text"=>"الإلغاء والرجوع ⛔","callback_data"=>"home"]
            ],
            ]);
        elseif($data == "continue2") :
           if($point["members"][$check[$chat_id]['mail']]["point"] >20){        
            edit("حسنا قم بإرسال ايدي الشخص",$home);
            $info[$chat_id]['mode'] = "send2";
            save($info);
                  } else {
        	bot("answercallbackquery",[
                "callback_query_id"=>$update->callback_query->id,
                "text"=>"رصيدك لا يكفي لهذه العملية",
                "show_alert"=>true
            ]);
                  }
            elseif( is_numeric($text) && $info[$chat_id]['mode'] == "send2") :
                        $chartchat = bot('getchat',['chat_id'=>$text ])->ok;
            if($chartchat == "true") {
                        send("حسنا قم بإرسال النقاط الآن");
                        $info[$chat_id]['mode'] = "point2";
                        $info[$chat_id]['idm'] = $text;
                        save($info);
        } else {
           send("هذا المستخدم غير موجود في البوت أو أنه قام بحظره"); 
           }
                 
        elseif( is_numeric($text) && $info[$chat_id]['mode'] == "point2") :
        if($text >20){ 
                if($text > $point['members'][$check[$chat_id]['mail']]['point'])exit;  
                $point['members'][$check[$chat_id]['mail']]['point'] -= $text;
                $point["members"][$check[$info[$chat_id]['idm']][ mail ]]["point"] += $text;
        save($point , "point");
        $last = $point['members'][$check[$chat_id]['mail']]['point'];
        $idm =$info[$chat_id]['idm'];
        send("تم التحويل بنجاح ✅

📟 المرسل : $fname
🧭 المستلم : [$idm](tg://user?id=$idm)
💵 المبلغ المحول : $text
💰 الرصيد المتبقي : $last
===================");
                sendd($info[$chat_id]['idm'] , "
🔄 - تم إعادة شحن حسابك بمبلغ ₽ $text  روبل. ✅
🎁 - بواسطة الوكيل:[$fname](tg://user?id=$chat_id) 🤎.
");
                $info[$chat_id]['idm'] =null;
                $info[$chat_id]['mode'] =null;
                save($info);
        } else {
        	send("عذرا لا يمكنك التحويل برصيد اقل من المسموح به");
        }
        
        
        elseif($data == "ban") :
            edit("حسنا قم بإرسال ايدي الشخص المراد تقييده",$home);
            $info[$chat_id]['mode'] = "ban";
            save($info);
            exit;
            elseif(preg_match("/[0-9]+/",$text) && $info[$chat_id]["mode"] == "ban"):
          send("تم تقييد المستخدم" , $home);
          sendd($text , "
 - تم تقيدك  من استخدم البوت⛔️.
- الدي قام بتقيدك الوكيل:- [$fname](tg://user?id=$chat_id)
");
             if(!in_array($text,explode("\n",file_get_contents('ban.txt')))){
				file_put_contents('ban.txt',$text."\n",FILE_APPEND);
			 }
             $info[$chat_id]["mode"] = null;
             save($info);
			exit;
			elseif($data == "unban") :
            edit("حسنا قم بإرسال ايدي الشخص المراد الغاء تقييده",$home);
            $info[$chat_id]['mode'] = "unban";
            save($info);
            exit;
            elseif(preg_match("/[0-9]+/",$text) && $info[$chat_id]["mode"] == "unban"):
          
             if(in_array($text,explode("\n",file_get_contents('ban.txt')))){
             	send("تم الغاء تقييد المستخدم" , $home);
          	sendd($text , "
 - تم الغاء تقيدك من استخدم البوت⛔️.
- الدي قام بالغاء بتقيدك الوكيل:- [$fname](tg://user?id=$chat_id)
");

				$s = str_replace($text . "\n",'',file_get_contents('ban.txt'));
				file_put_contents('ban.txt',$s);
			 }
             $info[$chat_id]["mode"] = null;
             save($info);
			exit;
			//str_replace('12','',explode("\n",$arr));
endif;
    #====================================================================#
else:
    die("@n_r_sy");
endif;

