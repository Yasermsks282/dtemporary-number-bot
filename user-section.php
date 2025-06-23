<?php
$sharh="1- أهلا بك في شرح بوت $bot ✅

2- لإستخدام هذا البوت عليك أولاً شحن حسابك بإحدى طرق الدفع المقبولة بالبوت ✅

3- لشحن حسابك قم بالضغط على زر 💰شحن الرصيد ومن ثم عليك إختيار طريقة دفع متوفرة لديك ومقبولة بالبوت ✅

4- بعد شحن رصيدك قم بالضغط على زر ☎ شراء رقم من البوت ومن ثم قم بإختيار التطبيق المطلوب ومن ثم الدولة التي تريد رقم لها ✅

5- في حال عدم وصول الكود يمكنك 🚫 حظر الرقم، لا تقلق لن يتم خصم سعر الرقم من رصيدك إلا بعد وصول الكود ✅

6- لتحويل رصيد إلى مستخدم آخر قم بالضغط على زر 🔄 تحويل رصيد ثم أرسل أيدي الشخص الذي تريد تحويل الرصيد له ثم أرسل الكمية التي تريد تحويلها، بالتوفيق 🌸✅";//شرح البوت
#================#
$ApiKey5sim        = "";//5sim
$api_key_super        = "";//super
$ApiKeySmsMan = "";//sms
#==============#
if(isset($update)):
if(!in_array($chat_id,explode("\n",file_get_contents('mem/members.txt')))){
	file_put_contents('mem/members.txt',$chat_id."\n",FILE_APPEND);
}
if(in_array($chat_id,explode("\n",file_get_contents('ban.txt')))){
	send("تم تقييدك من استخدام البوت");
	exit;
}
if((isset($text) || isset($data)) and $stat == "تشغيل"){
	send("البوت تحت الصيانة حاليا , سوف يتم إشعاركم في قناة البوت عند الإكتمال , ونشكر انتظاركم 💙🙂",
[
            [
                ["text"=>"✥ قناة البوت📢","url"=>"t.me/NUMBERVIPSMS"]
            ],
            ]);      
    exit;
	
}
if(($data == "home" || $text) && $info[$chat_id]["checker"] == "stop"){
	send("لا يمكنك استخدم البوت نظرا لانه لديك طلب معلق قم بحظر الرقم الذي طلبته او حظره لتتمكن من استخدام البوت");
    ;
    }
    @$home=[[["text"=>"القائمة الرئيسية 🏡","callback_data"=>"home"]]]; //home
#==============#
if( $point["members"][$check[$chat_id]['mail']]['point'] == null ):
            $point["members"][$check[$chat_id]['mail']]["point"] = 0;//نقاط العضو
            save($point,"opint");
endif;
#==============#

#===CHECK_MAIL======#
if($data=="home" && $check[$chat_id]["mail"] == null):
answer("لا يمكنك استخدام البوت قم بإنشاء حساب أولا 🛑");
exit; endif;
#===CHECK_MAIL======#

if( $text == "/start" ):    
    
        $info["members"][$chat_id]["mode"] =   null;
        save($info);
        send("
🙋‍♂️ • أهلاً بكم في NUMBER VIP الاول والأقوائ علئ التليجرام. 

🤚 • اضغط هنا للإنضمام الئ  [قناة البوت](https://t.me/NUMBERVIPSMS)

🙅🏼 • ادارة البوت:  [أصـيـل](https://t.me/NUMBERVIPSMS)

☑️  •  اضغط على زر لبدء الإستخدام. ⏬
",
[
            [
                ["text"=>"☑️ • بدء الإستخدام .","callback_data"=>"login_pannel"]
            ],
            [
                ["text"=>"↗️ • قناة البوت الرسمية .","url"=>"t.me/NUMBERVIPSMS"]
            ]
            ]);      
         exit; 
#==============#     
elseif ( $data == "home"):
              $info["members"][$chat_id]["mode"] =   null;
              $info[$chat_id]['mode'] =null;
              save($info);
              edit( "👨‍✈️ ⁞  اهلا بك:[$fname](tg://user?id=$chat_id)  🤍🌺
👨🏻‍✈️ ⌯ إليك تفاصيل حسابك 📋👇
🏦 ⌯ حسابك: " .$check[$chat_id][ mail ] . "
🗃 ⌯ ايدي حسابك: $id 🆔
💸 ⌯ رصيدك: ₽ " . $point["members"][$check[$chat_id][ mail ]]["point"] . " 💰
☑ ⌯  قناة البوت :@NUMBERVIPSMS

♻️ ⌯  تحكم الان عبر الأزرار بالأسفل. 🤗🌸" ,
 [
            [
                ["text"=>'⌯  شراء أرقام ☎️.',"callback_data"=>"numbers"]
            ],
            [
                
                ["text"=>"⌯ الأرقام الجاهزة🎗.","callback_data"=>"readynumbers"],
                ["text"=>"⌯ شحن رصيدك 💰.","callback_data"=>"shahn"]
            ],
            [
                ["text"=>'🎉 دعوة الأصدقاء',"callback_data"=>"collect"]
            ],
            [
                ["text"=>"⌯ عروض البوت 💫.","callback_data"=>"offers"],
                ["text"=>"⌯ البحث السريع🔍.","callback_data"=>"search"],
                
            ],       
            [
                ['text'=>"⌯ قسم الـرشـق 👤.",'callback_data'=>"rash"]
            ],
            
            [
                ["text"=>"⌯ سجل حسابك 🗄.","callback_data"=>"info"],
                ["text"=>"⌯ تحويل روبل 🔄.","callback_data"=>"transfer"],
            ],
                [["text"=>"⁞ المفضلة 🌟","callback_data"=>"fav"]],
            [
                ["text"=>"⌯ قسم الإعدادات ⚙.","callback_data"=>"settings"],
                ["text"=>"⌯ قسم الوكلاء 🧑🏼‍💻.","callback_data"=>"wak"],
            ],       
            [
                ['text'=>"⌯ تواصل مع الادارة 📮.",'callback_data'=>"help"]
            ]
            ]);      
        exit;
#==============#        
elseif($el[0] == "/start" && !preg_match("/\d+/",$el[1])) :
$link = base64_decode($el[1]);
$idd =  $check[$link]["idd"];
if($refral[$chat_id]["ref"] == null && $idd != $chat_id) {       
        $refral[$idd]["invit"]++;
        $refral[$chat_id]["ref"] = $link;
        save($refral , "refral");
sendd($idd , "قام " . "[$chat_id](tg://user?id=$chat_id) " . " بالدخول إلى فريقك عدد أعضاء فريقك الحالي " . $refral[$idd]["invit"] );
send("شكرا لإنضمامك إلى البوت الخاص بنا يمكنك إنشاء حساب والتمتع بخدماتنا " , [
            [
                ["text"=>" 🔘 اضغط هنا للدخول للبوت🏅","callback_data"=>"login_pannel"]
            ]
    ]);
  }
exit;
elseif ($ex[0] =="numbers" ):
edit("
✅ - يرجى إختيار البرنامج الذي تريد تفعيله. ⏬

☑️ - جميع البرامج تستقبل كود لمرة واحدة فقط.
",[           
                [                
                    ["text"=>"-  واتساب . 🌧", "callback_data"=>"con#wa#whatsapp"]
                ],
                [
                    ["text"=>"-  تيليجرام . ☂", "callback_data"=>"con#tg#telegram"],
                    ["text"=>"-  فيسبوك . 🚀", "callback_data"=>"con#fb#facebook"]
                ],
                [
                    ["text"=>"- إيمو . 💥", "callback_data"=>"con#im#imo"],
                    ["text"=>"- جوجل .  💫", "callback_data"=>"con#go#google"]
                ],
                [
                    ["text"=>"-  انستقرام . ⛱", "callback_data"=>"con#ig#instagram"],
                    ["text"=>"-  تويتر . 🧳", "callback_data"=>"con#tw#twitter"]
                ],
                [
                    ["text"=>"-  يلاشات . ☄", "callback_data"=>"con#yl#yalla"],
                    ["text"=>"-  فايبر . 💫", "callback_data"=>"con#fa#viber"]
                ],
                [                
                    ["text"=>"القائمة الرئيسية 🏡", "callback_data"=>"home"]
                ]
                ]);
#==============#               
elseif( $ex[0]  == "rash") :
        answer ("- قسم الرشق مغلق من الادارة موقتاً . 🚫");
       exit;
        elseif( $ex[0]  == "con") :
        edit(" •  يرجى اختيار أحد السيرفرات التالية اولاَ⬇️.
 • يوجد اكتر من 180 دولة متوفرة ☑️." , [
        
              [['text'=>' ⁞ خدمة البحث السريع 🔎','callback_data'=>"searching"]],
              [['text'=>'- سيرفر آسيا. ','callback_data'=>"server#Asia#$ex[1]#$ex[2]"],
              ['text'=>'- سيرفر أفريقيا.','callback_data'=>"server#Africa#$ex[1]#$ex[2]"]],                
              [['text'=>'- سيرفر إمركيا. ','callback_data'=>"server#Amrica#$ex[1]#$ex[2]" ],
              ['text'=>'- سيرفر أوروبا.','callback_data'=>"server#Erub#$ex[1]#$ex[2]" ]],
              [['text'=>'رجوع للخلف 🔙','callback_data'=>"numbers" ],
              ['text'=>'القائمة الرئيسية 🏡',"callback_data"=>"home"]
          ]
          ]);
       exit;
#==============#
#==============#
elseif($data == "searching"):
	send("ارسل النداء");
	$info[$chat_id]["mode"]  =   "search";
     save($info);
exit;
elseif(preg_match("/[0-9]+/",$text) && $info[$chat_id]["mode"] == "search"):
if(isset($numbers["num"][$text])){
	$ser  = $numbers["num"][$text]["ser"]; 
	$cont = $numbers["num"][$text]["name"];
	$list = "";
                      foreach($ser as $k) :    
                      	$list .= $k."-";
                      endforeach;
	send("
¦ يرجئ اختيار التطبيق التي تريد تفعيل الرقم عليه لدولة ".$cont."✅
¦ يوجد تطبيقات متنوعه للتفعيل ♻️☺️🍁
",[           
                [                
                    ["text"=>"¦ واتساب 🪗", "callback_data"=>"Buy#$text#$list#wa#whatsapp"]
                ],
                [
                    ["text"=>"¦ تليجرام  🎬", "callback_data"=>"Buy#$text#$list#tg#telegram"],
                    ["text"=>"¦ فيس بوك  🎲", "callback_data"=>"Buy#$text#$list#fb#facebook"]
                ],
                [
                    ["text"=>"¦ ايمو  🎼", "callback_data"=>"Buy#$text#$list#im#imo"],
                    ["text"=>"¦ جوجل 🎯", "callback_data"=>"con2#$text#go#google"]
                ],
                [
                    ["text"=>"¦ انستجرام ⛱", "callback_data"=>"Buy#$text#$list#ig#instagram"],
                    ["text"=>"¦ تويتر 📲", "callback_data"=>"Buy#$text#$list#tw#twitter"]
                ],
                [
                    ["text"=>"¦ يلا شات 🔋", "callback_data"=>"Buy#$text#$list#yl#yalla"],
                    ["text"=>"¦ فايبر 💡", "callback_data"=>"Buy#$text#$list#fa#viber"]
                ],
                [                
                    ["text"=>"القائمة الرئيسية 🏡", "callback_data"=>"home"]
                ]
                ]);
}else{
	send("لم يتم اضافه");
}
exit;
#==============#
elseif($data == "wak") :
$json["inline_keyboard"][]  =   [["text"=>"👨‍✈️ الوكيل.","callback_data"=>"."],["text"=>"🛒 الرابط. ","callback_data"=>"."]] ;
$e = 1;
foreach($numbers["wak"] as $key => $val) :    
                       
                       $name  = $numbers["wak"][$key]["name"];   
                       $user = $numbers["wak"][$key]["user"];    
                      
        if(isset($name) ) :
        
                      $json["inline_keyboard"][$e][]  =   ["text"=>"$name" ,"callback_data"=>"wakel#$key"];
                      $json["inline_keyboard"][$e][]  =   ["text"=>"اضغط" ,"url"=>"t.me/$user"];

                      
                      $e++;
                      else : $name = null;
         endif;                     
endforeach;
                $json["inline_keyboard"][]  =   [["text"=>"القائمة الرئيسية 🏡","callback_data"=>"home"]] ;
                 bot("editmessagetext",[
                "chat_id"=>$chat_id,
                "text"=>"🔰 - مرحباً بك عزيزي العميل في قسم وكلاء البوت الرسميين لـ بوت ⌯ تانجرو ✅.",
                "message_id" => $message_id,
                "reply_markup" => json_encode($json)
        ]);
        
     exit;
     elseif($ex[0] == "wakel") :
     $nam  = $numbers["wak"][$ex[1]]["name"];   
                       $usr = $numbers["wak"][$ex[1]]["user"];    
     $json["inline_keyboard"][]  =   [["text"=>"🛑 -  الابلاغ !","url"=>"t.me/EFZFF"]] ;
     $json["inline_keyboard"][]  =   [["text"=>"القائمة الرئيسية 🏡","callback_data"=>"home"]] ;
     bot("editmessagetext",[
                "chat_id"=>$chat_id,
                "text"=>"
🧑‍✈️ - الوكيل:- $nam
🛒 - يوزر الوكيل:- @$usr

🎁 - وكيل معتمد من إدارة البوت✅.

",
                "message_id" => $message_id,
                "reply_markup" => json_encode($json)
        ]);
    
       exit;
#==============#
elseif($ex[0] == "server") :
$e = 0;
foreach($numbers["num"] as $key => $val) :    
                       
                       $ser  = $numbers["num"][$key]["ser"];   
                       $con = $numbers["num"][$key]["con"];    
                      $list = "";
                      foreach($ser as $k) :    
                      	$list .= $k."-";
                      endforeach;
        if($numbers["num"][$key]["con"] == $ex[1] ) :
        			$i++;
                      if($i % 3 == 0) $e++;
                  	$name      = $numbers["num"][$key]["name"];
                      $json["inline_keyboard"][$e][]  =   ["text"=>$name ,"callback_data"=>"Buy#$key#$list#$ex[2]#$ex[3]"];
                      else : $name = null;
         endif;                     
endforeach;
                $json["inline_keyboard"][]  =   [["text"=>"للخلف ⏯","callback_data"=>"con#$ex[2]#$ex[3]"],["text"=>"القائمة الرئيسية 🏡","callback_data"=>"home"]] ;
                 bot("editmessagetext",[
                "chat_id"=>$chat_id,
                "text"=>"أختر الدولة الذي تريد شراء رقم لها يوجد أكثر من 100 دولة وبسيرفرات مختلفة اختر ما يناسبك",
                "message_id" => $message_id,
                "reply_markup" => json_encode($json)
        ]);
        
     exit;
     #==============#
elseif($data == "offers") :
$e = 0;
$json = [];
                $json["inline_keyboard"][$e]  =   [["text"=>"🌎 ⌯ الدولة.","callback_data"=>"hello"],["text"=>"⏬ ⌯ البرنامج.","callback_data"=>"hmm"],["text"=>"💰⌯ السعر.","callback_data"=>"Alwalidee"]];
                $e++;
foreach($numbers["offers"] as $key => $val) :    
                       
                       $ser  = $numbers["offers"][$key]["ser"];   
                       $con = $numbers["offers"][$key]["con"];   
                      
                       
					  $list = "";
                      foreach($ser as $k) :    
                      	$list .= $k."-";
                      endforeach;
                  	$name      = $numbers["offers"][$key]["name"];
                  	$price      = $numbers["offers"][$key]["price"];
                      $json["inline_keyboard"][$e][]  =   ["text"=>$name ,"callback_data"=>"B-N#$key#$list#$price"];
                      $json["inline_keyboard"][$e][]  =   ["text"=>explode("#",$con)[1] ,"callback_data"=>"Buy2#$key#$list#$con"];
                      $json["inline_keyboard"][$e][]  =   ["text"=>$price ,"callback_data"=>"Buy2#$key#$list#$con"];
                      $e++;
endforeach;
                $json["inline_keyboard"][]  =   [["text"=>"القائمة الرئيسية 🏡","callback_data"=>"home"]] ;
                 bot("editmessagetext",[
                "chat_id"=>$chat_id,
                "text"=>"⏬ - قائمة العروض المتوفرة بالبوت. ☑️",
                "message_id" => $message_id,
                "reply_markup" => json_encode($json)
        ]);
        
     exit;
#==============#
elseif($ex[0] == "Buy") :
$ser  = $numbers["num"][$ex[1]]["ser"];
$con = $numbers["num"][$ex[1]]["con"];
$app1 = $ex[3];
$app2 = $ex[4];
                $json = [];
                $json["inline_keyboard"][]  =   [["text"=>"السيرفر⏬","callback_data"=>"hello"],["text"=>"الكمية🔺.","callback_data"=>"hmm"],["text"=>"السعر 💰","callback_data"=>"Alwalidee"]];
if(in_array("5sim",$ser)) {                     
                $ok = $favourite["number"][$ser]["ok"];
                $country    = $numbers["num"][$ex[1]]["site-name"];
                $name       = $numbers["num"][$ex[1]]["name"];                    
               $price       = $numbers["num"][$ex[1]]["price"];       
               if($price != null)
               $json["inline_keyboard"][]  =   [["text"=>" سيرفر1⚡️." , "callback_data"=>"nothings"],["text" => "$count" ,"callback_data"=>"add#$ex[1]#$ex[2]#$opvalue"],["text"=>$price ." ₽"  ,"callback_data"=>"B-N#$ex[1]#5sim#$price#$app2"]]; 

 }  if(in_array("man",$ser)) {      
            	$ok = $favourite["number"][$ser]["ok"];
                $country    = $numbers["num"][$ex[1]]["site-name"];
                $price       = $numbers["num"][$ex[1]]["price"];       
                $json["inline_keyboard"][]  =   [["text" => "سيرفر2⚡️." ,"callback_data"=>"nothings"],["text"=>"$count" ,"callback_data"=>"add#$ex[1]#$ex[2]"],["text"=>"$price ₽","callback_data"=>"B-N#$ex[1]#man#$price#$app1"]]; 
  }
  if(in_array("super",$ser) and ($app2 == "whatsapp" or $app2 == "telegram")) {
  	if($app2 == "whatsapp"){
  		$ap = 2;
  		$cost = 16;
  	}
  	elseif($app2 == "telegram"){
  		$ap = 5;
  		$cost = 14;
  	}
            	$ok = $favourite["number"][$ser]["ok"];
                $country    = $numbers["num"][$ex[1]]["site-name"];
                $name       = $numbers["num"][$ex[1]]["name"];                
                $price        = $info["nesbah"] + $cost;
                $json["inline_keyboard"][]  =   [["text" => "سيرفر3⚡️." ,"callback_data"=>"nothings"],["text"=>"$price ₽","callback_data"=>"B-N#$ex[1]#super#$price#$ap"]]; 
  }
                $json["inline_keyboard"][]  =   [["text" => "تحديث الصفحة 🔁","callback_data"=>"Buy#$ex[1]#$ex[2]#$ex[3]#$ex[4]"]];
                $json["inline_keyboard"][]  =   [["text" => "للخلف ⏯","callback_data"=>"server#$con#$ex[3]#$ex[4]"],["text"=>"القائمة الرئيسية 🏡","callback_data"=>"home"]];
bot("editmessagetext",[
            "chat_id"=>$chat_id,
            "text"=>"😁🌸 ⌯ الدولة: $name
🤧♥️ ⌯ التطبيق : $app2. ☑️
☑️ ⌯ إختر احد السيرفرات للشراء منه. ☺️🌸

🛍️ ⌯ كل سيرفر يقوم بتوفير عدد من الارقام وكل سيرفر له سعر خاص به. 😌🌼" ,
            "message_id" => $message_id,
            "reply_markup" => json_encode($json)
        ]);
exit;
#==============#
elseif($ex[0] == "add"):
$web = $numbers["num"][$ex[1]]["ser"];
if($web == "5sim") { $elias = $favourite["number"][$web]["key"];
} else { $elias = $favourite["number"][$web]["key"]; }
if($elias == null) :
if($web == "5sim"):
$favourite["number"][$web]["app"] = $ex[2];
$favourite["number"][$web]["ok"] = "🌟";
$favourite["number"][$web]["ope"] = $ex[3];
$favourite["number"][$web]["key"] = $ex[1];
save($favourite , "favourite");

else:
$favourite["number"][$web]["key"] = $ex[2];
$favourite["number"][$web]["ok"] = "🌟";
$favourite["number"][$web]["key"] = $ex[1];
save($favourite , "favourite");
endif;
answer("تم إضافة الرقم الى قسم الأرقام المفضلة 🌟 \n اعمل تحديث للصفحة 🔃");

else : 
answer("تم حذف الرقم من الأرقام المفضلة 🗑");
if($web == "5sim") :
unset($favourite["number"][$web]);
save($favourite , "favourite");
else :
unset($favourite["number"][$web]);
save($favourite , "favourite");
endif;
endif;
#==============#
        elseif ( $data == "shahn" ) :
        edit("
☑️  • قسم شحن رصيد الروبل الخاص بك:

🌀 • يمكنك شحن رصيدك من الإدارة مباشرة او عبر التواصل مع الوكلاء.
🪗 • نقبل جميع طرق الدفع المذكورة بالأسفل: ⬇️

🙅🏼 • إذا كنت لا تملك طريقة دفع من الأسفل، تواصل مع الإدارة الخاصة بالبوت: @n_r_sy
" ,[
           [
                 
                 ['text'=>'💲 • إيداع كريمي {شمال - جنوب}.', "url"=>"https://t.me/n_r_sy"]
           ],
          [
                ['text'=>'💲 • تحويل صرافات { شمال - جنوب}. ','url'=>"https://t.me/n_r_sy"]
          ],
          [
                ['text'=>'💲 • كروت شحن { سوا - مبايلي }.', "url"=>"https://t.me/n_r_sy"],
           ],
           [
                ['text'=>'💲 • العملات رقمية {جميعها مقبولة}.', "url"=>"https://t.me/n_r_sy" ]
          ],
          [
                ['text'=>'💲 • البنوك الإكترونية {بايير - بايبال}.','url'=>"https://t.me/n_r_sy"]
          ],
          [
                ['text'=>'👨🏻‍💻 • ادارة البوت{ لشحن حسابك}.', "url"=>"https://t.me/n_r_sy"]
          ],
          [
                ['text'=>'🔙 الرجوع إلى الصفحة الرئيسية','callback_data'=>'home']
         ]
         
    ]);                  
 exit;
 #==============#
elseif (preg_match("/buycard#([0-9]+)#([0-9]+)#([A-z0-9]+)/",$data,$res)) :
          edit("⛔️ سيتم خصم ₽ $ex[1] من رصيد حسابك ✅🔄 مقابل شراء كرت شحن ₽ $ex[1] روبل ♈️
💳 رصيدك الان هو:"  . $point["members"][$check[$chat_id]['mail']]["point"]
. "💰\n

☑️ هل أنت موافق على ذالك أم لا!! ⬇️
" , [
           [
                ["text"=>"موافق | ✅","callback_data"=>"okk#$res[1]#$res[2]#$res[3]"],
                ["text"=>"الإلغاء والرجوع | ⛔","callback_data"=>"home"]
            ]
]);                         
exit;
#==============#
       elseif ( preg_match("/okk#([0-9]+)#([0-9]+)#([A-z0-9]+)/",$data,$res)) :
        if($res[2] > 0) {
        if($res[1] <=  $point["members"][$check[$chat_id]['mail']]["point"] ) :
        $numbers['baageel'] += 1;
        save($numbers,'numbers');
        $acode  =   substr(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOBQRSTUVWXYZ"), 1, 10);
        $code   =   $numbers['baageel'].$acode;
        $balance = $point['members'][$check[$chat_id]['mail']]['point'] - $res[1];
        edit("✳️ ⁞ تم شراء الكرت بنجاح!

☎️ ⁞ الكود: $code
💬 ⁞ السعر: $res[1]
🌀 ⁞ رصيدك الحالي:  " . $members['members'][$check[$chat_id]['mail']]['point'] . "\n
💰 ⁞ رصيدك السابق: ₽ $balance

✅ تمت العملية  بنجاح. 😉♥️",
$home);
       $point["members"][$check[$chat_id]['mail']]["point"] -= $res[1];
        save($point , "point");
        $numbers[$code]['price'] = $res[1];
        save($numbers,"numbers");
        $static['cards']++;
        $static[$chat_id]['cards']++;
        save($static,"static");
        $chart[$chat_id]["buycards"][] = $code;
          done($chart);
        else : 
       answer("رصيدك غير كافي لإتمام العملية");
                  endif;
                }  else {
                  answer("لقد انتهت الكروت لهذه الفئه انتظر حتى يتم توفيرها");         
                }
        
       elseif($data == "help"):
       edit("👨‍✈|أهلاً صديقي.

📍|أنت الأن في التواصل مع الدعم، أي رسالة ارسلها سيتم إيصالها الئ الأدارة فوراً.
📊|أي مشكلة واجهتك في البوت فقط قم بإرسالها هنا الان،ولااتنسئ إرفاقها مع الأيدي الخاص بك بالبوت.
🕐|متواجدون علئ مدار الساعة.

❎|تجنب إرسال الاساءات إن أمكن.", [
            [               
                ["text"=>"الغاء التواصل ⛔","callback_data"=>"login_pannel"]
            ],
            ]);
            $info[$chat_id]['mode'] = "help";
            save($info);           
exit;
elseif(preg_match("/send#([0-9])+#([0-9])+/",$data , $s)) :
send("ارسل رسالتك الآن");
$info[$chat_id]["mode"]  =   "id";
$info[$chat_id]['mid']  = $s[2];
$info[$chat_id]['idmem'] = $s[1];
save($info);
exit;
elseif($message && $chat_id == $admin && $info[$chat_id]["mode"]  == "id") :
       bot('sendmessage',[
       'chat_id' => $info[$chat_id]['idmem'],
       'text' => "تم الرد على رسالتك الرد 👇👇",
       'reply_to_message_id'=> $info[$chat_id]['mid']
       ]);
       bot(copymessage,[
            chat_id=>$info[$chat_id]['idmem'],
            message_id=>$message_id,
           from_chat_id=>$admin,
       ]);
     exit;
            elseif ($message && $info[$chat_id]['mode'] =="help") : 
            if(isset($text)) : $type = "نص"; else : $type ="ميديا"; endif;          
            bot(copymessage,[
            chat_id=>$admin,
            message_id=>$message_id,
           from_chat_id=>$chat_id,
       ]);
sendd($admin, "📨 | رسالة جديدة 
-----------------------------
🧑‍✈️ | المرسل :- $fname
🆔 | ايدي المرسل :- $chat_id
🗒 | نوع الرسالة :- $type
-----------------------------
هل تريد الرد على الرسالة 🙄🙄" , 
          [
            [
                ["text"=>"الرد على الرسالة ✅","callback_data"=>"send#$chat_id#$mid"],                
            ],
            ]);
            unset($info[$chat_id]["idmem"]);
            unset($info[$chat_id]["mid"]);
            save($info);
            send("تم وصول رسالتك الى الإدارة انتظر حتى يتم الرد عليك");

#==============#
    elseif ( $data == "card" ):
               edit("قم باسال الكرت",$home);
               $info[$chat_id]["mode"]  =   "card";
               save($info);
     exit;
#==============#     
    elseif ( preg_match("/([A-z0-9])+/",$text) && $info[$chat_id]["mode"] == "card" ):
               $price = $numbers[$text]['price'];
               $last = $point["members"][$check[$chat_id]['mail']]["point"] - $price;
    if ( $numbers[$text]['price'] == null ):
               send("الكرت هذا غير موجود أو تم استخدامه",$home);
   else :
              $point["members"][$check[$chat_id]['mail']]["point"] += $price;
               save($point , "point");
              send("تم شحن حسابك ب $price
--------------------------
💰 ⁞ رصيدك السابق :-  $last
💵 ⁞ رصيدك الحالي :- " . $point["members"][$check[$chat_id]['mail']]["point"] . "
-------------------------
شكرا لاستخدامك البوت🌟"
, $home);
            $info[$chat_id]["mode"]   =   null;
            save($info);
            sendd($admin,"⚜ New Card has discharge  :\n\n📝 Code: $text\n🧭 ID: $chat_id
🎫 Name:\n[$fname](tg://user?id=$chat_id)\n💰 Price: ₽ 5");
            $static[$chat_id]['cards']++;
            $static[$chat_id]['cardcount']++;
            $static[$chat_id]['shahn']++;
            save($static,"static");
            unset($numbers[$text]['price']);
            $numbers['cards'][$code]['amount']--;
            save($numbers,"numbers");
            $chart[$chat_id]["cards"][] = $text;
            done($chart);
        endif;
        exit;
#==============#     
elseif ( $data == "How" ):
                  edit($sharh,$home);
#==============#
        elseif($data == "transfer") :
        edit("
✅ | يمكنك الأن شحن حسابك العميل خصمها من حسابك!. 
⚠️ | أقل مبلغ للشحن:  20.00روبل✅.

✳️ | هل تريد شحن رصيد الئ حساب أخر؟.
",  [
           [
                ["text"=>"تأكيد ✅","callback_data"=>"continue"],
                ["text"=>"الإلغاء والرجوع ⛔","callback_data"=>"home"]
            ],
            ]);
#==============#         
elseif ($data == "info") :
if($static['conum']==null) { $static['conum']=0; }  if($static['bot']['balance']) $static['bot']['balance'] =0;
if($static['cards']==null) { $static['cards']=0; } if($static[$chat_id]['unconum']==null) { $static[$chat_id]['unconum'] =0; } 
        $mem = count($members);
        $complete = $static['conum'];
        $incomplete = $static['unconum'];
        $cardnum = $static['cards'];
        $botba = $static['bot']['balance'];
        $ready = $static['ready'];
        //user static //
if($static[$chat_id]['conum']==null) { $static[$chat_id]['conum']=0; } if($static[$chat_id]['ready']==null) { $static[$chat_id]['ready']=0; }
if($static[$chat_id]['cards']==null) { $static[$chat_id]['cards']=0; } if($static['unconum']==null) { $static['unconum'] =0; }
        $usco = $static[$chat_id]['conum'];
        $usready = $static[$chat_id]['ready'];
        $uscards = $static[$chat_id]['cards'];
        $minus    = $static[$chat_id]["minus"] ;
        $usrobel = $point["members"][$check[$chat_id]['mail']]['point'];
        $member =  count($members);
        edit("☑️ ⁞ إحصائيات استخدام بوت : 🌻🌞

👬 ⁞ عدد المستخدمين النشطين: { $member } 
✅ ⁞ عدد الأرقام المكتملة: { $complete } 
🏷 ⁞ عدد الكروت التي تم شراوها: { $cardnum } 

🌞 ⁞ عدد الأرقام الجاهزة المشتراة:  $ready  ☑️

☑️ ⁞ سجل حسابك الشخصي:
❇️ ⁞ عدد الأرقام الجاهزة التي تم شراؤها: { $usready } 
✅ ⁞ إحصائيات أرقامك المكتملة: { $usco } 
🏦 ⁞ إحصائيات كروتك المشترى: { $uscards } 
💰 ⁞ إحصائيات الروبل المتبقي: { $usrobel ₽ } 

💹 ⁞ تم بدء نظام الحوسبة 2022/9/23م "
, [
[
                ['text'=>"✥ - معلومات حسابي 🗞.",'callback_data'=>"inf"]],
                            [
                            ['text'=>"✥ - تغيير كلمه السر 🔐.",'callback_data'=>"chang"]
                            ],
                   
                   [
                            ['text'=>'✥القائمه الرئيسية🔷',"callback_data"=>"home"]
            ]
 ]);
exit;
#==============#
            elseif($data == "continue") :
           if($point["members"][$check[$chat_id]['mail']]["point"] >20){        
            edit("حسنا قم بإرسال ايدي الشخص",$home);
            $info[$chat_id]['mode'] = "send";
            save($info);
                  } else {
        	bot("answercallbackquery",[
                "callback_query_id"=>$update->callback_query->id,
                "text"=>"رصيدك لا يكفي لهذه العملية",
                "show_alert"=>true
            ]);
                  }
            elseif( is_numeric($text) && $info[$chat_id]['mode'] == "send") :
                        $chartchat = bot('getchat',['chat_id'=>$text ])->ok;
            if($chartchat == "true") {
                        send("حسنا قم بإرسال النقاط الآن");
                        $info[$chat_id]['mode'] = "point";
                        $info[$chat_id]['idm'] = $text;
                        save($info);
        } else {
           send("هذا المستخدم غير موجود في البوت أو أنه قام بحظره"); 
           }
                 
        elseif( is_numeric($text) && $info[$chat_id]['mode'] == "point") :
        if($text >20){ 
                if($text > $point['members'][$check[$chat_id]['mail']]['point'])exit;  
                $point['members'][$check[$chat_id]['mail']]['point'] -= $text;
                //$point['members'][$info[$check[$chat_id]['mail']]['idm']]['point'] += $text;
                $point["members"][$check[$info[$chat_id]['idm']][ mail ]]["point"] += $text;
        save($point , "point");
        $last = $point['members'][$check[$chat_id]['mail']]['point'];
        $idm =$info[$chat_id]['idm'];
        send("تم شحن حساب العميل بنجاح ✅.
📟 المرسل : $fname
🧭 المستلم : [$idm](tg://user?id=$idm)
💵 المبلغ المحول : $text
💰 الرصيد المتبقي : $last
===================");
                sendd($info[$chat_id]['idm'] , "💰 ⁞ تم تحويل ₽ $text إليك!✅ ⁞ من  $fname ");
                $info[$chat_id]['idm'] =null;
                $info[$chat_id]['mode'] =null;
                save($info);
        } else {
        	send("عذرا لا يمكنك التحويل برصيد اقل من المسموح به");
        }
        
#====BUY_NUMBER====#

elseif($el[0] == "/start") :
$code = explode("#"  , $el[1]);
if($code[0] == "buy") {
$number           = $readynumber['ready'][$code[1]]['number'];
$price                = $readynumber['ready'][$code[1]]['price'];
$now                = $readynumber['ready'][$code[1]]['now'];
$country          = $readynumber['ready'][$code[1]]['country'];
$what               = $readynumber['ready'][$code[1]]['what'];
$numbery = substr($number, 0,-6)."••••";
 if($number != null ){
 	      $keyboad['inline_keyboard'][] = [['text'=>'االحالة ⁉️','callback_data'=>'no'],['text'=>'السعـــر💲','callback_data'=>'no'],['text'=>'الدولة 🏴','callback_data'=>'no']];
           $keyboad['inline_keyboard'][] = [['text'=>"$now",'callback_data'=>"Noyesnum#$code[1]"],['text'=>$price . ".00₽",'callback_data'=>"Noyesnum#$code[1]"],['text'=>"$country",'callback_data'=>"Noyesnum#$code[1]"]];
           $keyboad['inline_keyboard'][] = [['text'=>'القائمة الرئيسية 🏡',"callback_data"=>"home"]];
           bot('sendmessage', [
           'chat_id' => $chat_id,
           'text' => "💯 إليك قائمة الأرقام الجاهزة للواتس اب\n👇 اضغط على احدها للشراء",
           'reply_markup'=>json_encode($keyboad)
     ]);
} else {
	send("الرقم غير موجود او قد تم شراءه");
	}}
exit;
    
elseif($data == 'readynumbers') :
if($readynumber['ready'] != null ){
               $keyboard = [];
               $keyboad['inline_keyboard'][] = [['text'=>'االحالة ⁉️','callback_data'=>'no'],['text'=>'السعـــر💲','callback_data'=>'no'],['text'=>'الدولة 🏴','callback_data'=>'no']];
foreach($readynumber['ready'] as $zero=>$val) :
               $now = $val['now'];
               $country = $val['country'];
               $price = $val['price'];
               $keyboad['inline_keyboard'][] = [['text'=>"$now",'callback_data'=>"Noyesnum#$zero"],['text'=>$price . ".00₽",'callback_data'=>"Noyesnum#$zero"],['text'=>"$country",'callback_data'=>"Noyesnum#$zero"]];
endforeach;
               $keyboad['inline_keyboard'][] = [['text'=>'تحديث الصفحة 🔂',"callback_data"=>"readynumbers"],['text'=>'القائمة الرئيسية 🏡',"callback_data"=>"home"]];
               bot('EditMessageText',[
               'chat_id'=>$chat_id,
               'message_id'=>$message_id,
               'text' => "💯 إليك قائمة الأرقام الجاهزة للواتس اب \n 👇 اضغط على احدها للشراء",
               'reply_markup'=>json_encode($keyboad)
            ]);
       } else {
              answer("❌ لا يتوفر أرقام جاهزة حاليا ");
  }
exit;

//قبول ورفض شراء الأرقام الجاهزة
elseif(preg_match('/(Noyesnum)/',$data)) :
$zero              = $ex[1];
$num              = $readynumber['ready'][$zero]['number'];
$price             = $readynumber['ready'][$zero]['price'];
$now              = $readynumber['ready'][$zero]['now'];
$country        = $readynumber['ready'][$zero]['country'];
$what             = $readynumber['ready'][$zero]['what'];
$number        = substr($num, 0,-6) . "••••";
$Balancee     = $point["members"][$check[$chat_id]['mail']]['point'];
$Balance       = $Balancee - $price;

if($readynumber[$chat_id]["buy"] == "stop") {
answer(" لا يمكنك شراء الرقم الجاهز في نفس وقت شراء رقم آخر قم بإلغاء الرقم السابق ثم حاول مجدداً 🌚" );

} elseif($price > $point["members"][$check[$chat_id]['mail']]['point']) {
send("⚠️ ⌯ لايوجد لديك رصيد كافي لشراء هذا الرقم!
💰 ⌯ رصيدك المتوفر ⪼ ₽". $point["members"][$check[$chat_id][ mail ]]["point"]
);
} elseif($zero == null) {
send("
❌ هذا الرقم لم يعد متاحا
♻ اضغط تحديث الصفحة
");
} else {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*☑️ أنت الان تقوم بشراء رقم جاهز من البوت 🌚
⚠️ معلومات عن الرقم الذي تريد شرائه:
🏴 الدولة: $country
📞 الرقم: $number
📲 التطبيق: واتساب - (Whatsapp)
💰 السعر: $price ₽
✨ الحالة: $now ✅
⁉️ ملاحظة: $what

🛃 رصيدك الان هو: ₽ $Balancee 💰
🔄 سيكون رصيدك بعد الشراء: ₽ $Balance 🧭

📮 هل أنت موافق على ذالك أو لا!! ⬇️*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'نعم ✅','callback_data'=>"readdd#$zero"],['text'=>'لا ❌','callback_data'=>"readynumbers"]],
[['text'=>'القائمة الرئيسية 🏡','callback_data'=>"home"]]
]
])
]);
$readynumber[$chat_id]["buy"] = "stop";
save($readynumber , "readynum");

}
exit;

// التحقق من الرصيد عند شراء الرقم الجاهز
elseif(preg_match('/(readdd)/',$data)) :
$zero                 = $ex[1];
$num                 = $readynumber['ready'][$zero]['number'];
$code                = $readynumber['ready'][$zero]['code'];
$price                = $readynumber['ready'][$zero]['price'];
$country            = $readynumber['ready'][$zero]['country'];
$now                  = $readynumber['ready'][$zero]['now'];
$what                 = $readynumber['ready'][$zero]['what'];
$idnum              = substr(str_shuffle('12345689807'),1,9);


if($price > $point["members"][$check[$chat_id]['mail']]['point']) {
answer("⚠️ ⌯ لايوجد لديك رصيد كافي لشراء هذا الرقم!
💰 ⌯ رصيدك المتوفر ⪼ ₽". $point["members"][$check[$chat_id][ mail ]]["point"]
);
} elseif( $zero == null) {
answer("
❌ هذا الرقم لم يعد متاحا
♻ اضغط تحديث الصفحة
");
} else {
edit("
*تم شراء الرقم بنجاح ☑️

🔶 الدولة: $country
📞 الرقم: $num
♻️ الكود: $code
💰 السعر: $price ₽
🆔 ايدي معاملتك: $idnum
✨ الحالة: $now ✅
⁉️ ملاحظة: $what

*
",$home);
unset($readynumber['ready'][$zero]);
unset($readynumber[$chat_id]["buy"]);
save($readynumber , "readynum");
$point["members"][$check[$chat_id]['mail']]["point"] -= $price;
save($point , "point");
$static['ready']++;             
$static[$chat_id]['ready']++;             
$static['bot']['balance'] +=  $price;     
$static[$chat_id]["minus"] += $price;        
save($static,"static");             
$chart[$chat_id]["numbers"][] = $num;             
done($chart);
} 


    
elseif( $ex[0] == "B-N" ) :    
if ( $ex[3] <= $point["members"][$check[$chat_id]['mail']]["point"] ) {
	
            $name        =    $numbers["num"][$ex[1]]["name"]; //اسم السلعة//
            $price         =     $ex[3] ; //السعر//
            
            $service      =     $ex[4];//اسم الخدمة//
            $web            =     $ex[2]; //اسم الموقع//
            
            
if ( $web == "5sim" ) {
	$country     =     $numbers["num"][$ex[1]]["site-name"];
          $sim5 = file_get_contents("https://api1.5sim.net/stubs/handler_api.php?api_key=$ApiKey5sim&action=getNumber&service=$service&forward=forward&operator=any&country=$country");            
          $ex_api = explode(":",$sim5);
          $idnumber = $ex_api[1];
          $num = "+" ."`$ex_api[2]`";
          
if($sim5 == "NO_NUMBERS" || $sim5 == "BAD_ACTION" || $sim5 == "BAD_SERVICE" || $sim5 == "ERROR_SQL" || $sim5 == "" || $num == null ){
          answer("⚠️ ◐ لاتوجد أرقام لهذا السيرفر في الوقت الحالي
✅ ◐ أعد الضغط علية مجددا او حاول مرة اخرئ.");
} elseif($sim5 == "NO_BALANCE" || $sim5 == "BAD_KEY"){
                	answer("عذرا عزيزي المشترك لقد انتهى الرصيد في الموقع تخلى بالصبر سيتم اعادة شحن الموقع قريبا 🙃 $service $country");
                    sendd($admin,"تم إيقاف النقل، إما بسبب تغير api الحساب أو بسبب نقصان الرصيد في الموقع ❌");
                    sendd($usapi["user_id"],"لقد اكتملت عملية النقل وتم الرصيد اضافة الرصيد الى حسابك");
                    unlink("stor/Api.kson");
                  } else {
                    edit("
                    
🛍 ¦ تم شراء الرقم بنجاح. ✅
☎️ ¦ الرقم: $num
🎪 ¦ الدولة :$country
💭 ¦ الكود:  *Loading*
🪗 ¦ الحالة: *غير مكتمل ❌*
💰 ¦ السعر: ₽ : $price

✳️ ¦ تم شراء الرقم بنجاح!

☑️ ¦ إضغط على الرقم لنسخة!
🧩 ¦ أدخل الرقم في الواتسأب لوصول الكود، ثم أضغط على زر جلب الكود
",             [
                        [
                        	[
                                "text"=>"🪗 ¦ عرض الرقم في واتساب ↖️",
                                "url"=>"http://wa.me/$num"
                            ]
                            
                        ],
                        [
                            [
                                "text"=>"💬 ¦ طلب الكود",
                                "callback_data"=>"getcode#$num#$idnumber#5sim"
                            ]
                        ],
                        [
                            [
                                "text"=>"⚠️ ¦ الغاء الرقم",
                                "callback_data"=>"bandnumber#$num#$idnumber#$price#5sim"
                            ]
                        ]
                    ]);
sendd("-1002539964548","
- تم شراء جديد رقم من البوت  ✅.
☎️ - الرقم: $num
🤸‍♂ - التطبيق: $service
🎗 - الدوله: $country
🆔 - الحساب:  $chat_id
🔥 - السعر: $price  ₽
🎟 - الرصيد المتبقي: ".($point["members"][$check[$chat_id]['mail']]["point"] - $price)."
🏋‍♂ - الايميل : ".$check[$chat_id][ mail ]."
🪗- الموقع: 5sim.net
");                       
            $info[$chat_id][$web]['check'] = "ban"; 
            save($info);
            $static["info"]["numbers"]["count"]  +=  1;
            $static["info"]["numbers"]["point"]  +=  $price;
            save($static,"static");
            $point["members"][$check[$chat_id]['mail']]["point"] -= $price;
            save($point, "point");
            $info[$chat_id]["checker"] = "stop";
             save($info);
       }
 }
                
        
        if ( $web == "man" ) {
        	
        	$country     =     $nnn[$ex[1]]; //الدولة//
            	$man = file_get_contents("http://api.sms-man.com/stubs/handler_api.php?action=getNumber&api_key=$ApiKeySmsMan&service=$service&country=$country");
            
                $sms = explode(":",$man);
                $num = "+" ."`$sms[2]`";
                $idnumber = $sms[1];
                if ($man == "NO_NUMBERS" ) {
                answer("لا يتوفر أرقام حاليا حاول مجددا 😉");
                exit;
       } elseif($man =="NO_BALANCE" ) {
               answer("انتهى الرصيد في الموقع انتظر حتى يتم الشحن");                       
                  
                   } elseif($sms[0] == "NUMBER VIP" ) {
                    edit("
🛍 ¦ تم شراء الرقم بنجاح. ✅
☎️ ¦ الرقم: $num
💭 ¦ الكود:  *Loading*
🪗 ¦ الحالة: *غير مكتمل ❌*
💰 ¦ السعر: ₽ : $price

✳️ ¦ تم شراء الرقم بنجاح!

☑️ ¦ إضغط على الرقم لنسخة!
🧩 ¦ أدخل الرقم في الواتسأب لوصول الكود، ثم أضغط على زر جلب الكود
",[
                        
                        [
                        	[
                                "text"=>"⚜️ ⌯ عرض رقم في واتساب. ↖️",
                                "url"=>"http://wa.me/$num"
                            ]
                            
                        ],
                        [
                            [
                                "text"=>"❇️ ⌯ جلب الكود.",
                                "callback_data"=>"getcode#$num#$idnumber#man"
                            ]
                        ],
                        [
                            [
                                "text"=>"⚠️ ⌯ إلغاء الرقم.",
                                "callback_data"=>"bandnumber#$num#$idnumber#$price#man"
                            ]
                        ]
                    ]);
                $info[$chat_id][$web]['check'] = "ban"; 
            save($info);
            $static["info"]["numbers"]["count"]  +=  1;
            $static["info"]["numbers"]["point"]  +=  $price;
            save($static,"static");
            $point["members"][$check[$chat_id]['mail']]["point"] -= $price;
            save($point, "point");
            $info[$chat_id]["checker"] = "stop";
             save($info);
sendd("-1002801340431","
- تم شراء رقم ✅.
☎️ - الرقم: $num
🚹 - التطبيق: $service
🌐 - دولة: $country
🆔 - حسابه: [$chat_id](tg://user?id=$chat_id)
🔥 - السعر: $price ₽
💴 - الرصيد المتبقي: ".($point["members"][$check[$chat_id]['mail']]["point"] - $price)."
🏋🏽 - الايميل: ".$check[$chat_id][ mail ]."
🎫 - الموقع: sms-activate.ru
");            
        
      }  else {
      	
      	answer("لا يوجد أرقام حاليا حاول مجددا ( hmm🙂 )");
      }
   }          
   ///////
   if ( $web == "super" ) {
   	$country     =     $sup[$ex[1]]; //الدولة//
		$url = "https://www.supersms.ml/api/getnumber?channel=1&country=".$country."&pid=".$service."&secret_key=$api_key_super";
          $sim5 = json_decode(file_get_contents($url), true);
          $num = str_replace('+','',$sim5["phone"]);
          $taskid = $sim5["taskid"];
if($sim5["message"] == "Phone number not found. Please try again later. (Suggestion: Try another country or another channel)" || $sim5["message"] == "8 per 1 minute" || $sim5["message"] == "The phone number is not available. Please try again later. (Suggestion: Try another country or another channel)"){
          answer("⚠️ ◐ لاتوجد أرقام لهذا السيرفر في الوقت الحالي
✅ ◐ أعد الضغط علية مجددا او حاول مرة اخرئ.");
} elseif($sim5["message"] == "Insufficient Balance" || $sim5["message"] == "No user found."){
                	answer("عذرا عزيزي المشترك لقد انتهى الرصيد في الموقع تخلى بالصبر سيتم اعادة شحن الموقع قريبا 🙃");
                    sendd($admin,"تم إيقاف النقل، إما بسبب تغير api الحساب أو بسبب نقصان الرصيد في الموقع ❌");
                    sendd($usapi["user_id"],"لقد اكتملت عملية النقل وتم الرصيد اضافة الرصيد الى حسابك");
                    unlink("stor/Api.kson");
                  } elseif($num != null) {
                    edit("
                    
🛍 ¦ تم شراء الرقم بنجاح. ✅
☎️ ¦ الرقم: +$num
🎪 ¦ الدولة :$country
💭 ¦ الكود:  *Loading*
🪗 ¦ الحالة: *غير مكتمل ❌*
💰 ¦ السعر: ₽ : $price

✳️ ¦ تم شراء الرقم بنجاح!

☑️ ¦ إضغط على الرقم لنسخة!
🧩 ¦ أدخل الرقم في الواتسأب لوصول الكود، ثم أضغط على زر جلب الكود
",             [
                        [
                        	[
                                "text"=>"🪗 ¦ عرض الرقم في واتساب ↖️",
                                "url"=>"http://wa.me/$num"
                            ]
                            
                        ],
                        [
                            [
                                "text"=>"💬 ¦ طلب الكود",
                                "callback_data"=>"getcode#$num#$taskid#super"
                            ]
                        ],
                        [
                            [
                                "text"=>"⚠️ ¦ الغاء الرقم",
                                "callback_data"=>"bandnumber#$num#$taskid#$price#super"
                            ]
                        ]
                    ]
);
sendd("-1002801340431","
- تم شراء جديد رقم من البوت  ✅.
☎️ - الرقم: $num
🤸‍♂ - التطبيق: $service
🎗 - الدوله: $country
🆔 - الحساب:  $chat_id
🔥 - السعر: $price  ₽
🎟 - الرصيد المتبقي: ".($point["members"][$check[$chat_id]['mail']]["point"] - $price)."
🏋‍♂ - الايميل : ".$check[$chat_id][ mail ]."
🪗- الموقع: 5sim.net
");                       
            $info[$chat_id][$web]['check'] = "ban"; 
            save($info);
            $static["info"]["numbers"]["count"]  +=  1;
            $static["info"]["numbers"]["point"]  +=  $price;
            save($static,"static");
            $point["members"][$check[$chat_id]['mail']]["point"] -= $price;
            save($point, "point");
            $info[$chat_id]["checker"] = "stop";
             save($info);
       }
 }
   //////
        } else {
        answer("⚠️ ⌯ لايوجد لديك رصيد كافي لشراء هذا الرقم!
💰 ⌯ رصيدك المتوفر ⪼ ₽ ". $point["members"][$check[$chat_id][ mail ]]["point"]
);
        }
        exit;
#================================#
    elseif ( $ex[0] == "getcode" && $ex[3] == "5sim" ) :
        $chartcode5sim  =   file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=$ApiKey5sim&action=getStatus&id=$ex[2]");
        $exx    =   explode(":",$chartcode5sim);
        if ( $exx[0] == "STATUS_OK" ) {
            $num = $ex[1];
            $code = $exx[1];
            edit("✳️ ⁞ تم شراء الرقم بنجاح!

☎️ ⁞ الرقم: $num
💬 ⁞ الكود: $code
🌀 ⁞ الحالة: مكتملة ✅

✅ تم وصول الكود بنجاح. 😉♥️");
            file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=$ApiKey5sim&action=setStatus&status=6&id=$ex[2]");
            $static['conum'] ++;
            $static[$chat_id]['conum']++;
            $static[$chat_id]['robel']++;
            $static['bot']['balance'] +=  $price;
            save($static,"static");
            
            unset($info[$chat_id]["checker"]);
             save($info);
            $chart[$chat_id]["numbers"][] = $code;
            done($chart);
        } else {
            answer("لم يصل الكود يرجى المحاولة بعد 5 ثواني");
        }
                                 
    elseif ( $ex[0] == "getcode" && $ex[3] == "man" ):
        $man    =   file_get_contents("http://api.sms-man.com/stubs/handler_api.php?action=getStatus&api_key=$ApiKeySmsMan&id=$ex[2]");
        if( $man == "STATUS_WAIT_CODE" || $man == "STATUS_WAIT_RETRY"  ) {
        	answer("لم يصل الكود يرجى المحاولة بعد 5 ثواني");
        } elseif($sms == "STATUS_CANCEL") {
        	answer("انتهت مهلة الرقم حاول مرة أخرى");
        } else {
        	$sms = explode(":",$man);
            $num = $ex[1];
            $code = $sms[1];  
  if($code == null) :       
           answer("لم يصل الكود الى الآن تأكد من ان الرقم غير محظور او تم استخدامه");
  else :
            edit("✳️ ⁞ تم شراء الرقم بنجاح!
       
☎️ ⁞ الرقم: $num
💬 ⁞ الكود: $code
🌀 ⁞ الحالة: مكتملة ✅


✅ تم وصول الكود بنجاح. 😉♥️");
            file_get_contents("http://api.sms-man.com/stubs/handler_api.php?action=setStatus&api_key=$ApiKeySmsMan&id=$ex[2]&status=6");  
            $static['conum'] ++;
            $static[$chat_id]['conum']++;
            $static[$chat_id]['robel']++;
            $static['bot']['balance'] +=  $price;
            save($static,"static");
            $chart[$chat_id]["numbers"][] = $code;
            done($chart);
            unset($info[$chat_id]["checker"]);
             save($info);
            endif;
        }
        elseif ( $ex[0] == "getcode" && $ex[3] == "super" ):
        $url    =   "https://www.supersms.ml/api/getcode?taskid=$ex[2]&secret_key=$api_key_super";
        $super = json_decode(file_get_contents($url), true);
        $mes = $super["message"];
        if( $mes == "SMS not yet received. Try again!") {
        	answer("لم يصل الكود يرجى المحاولة بعد 5 ثواني");
        } elseif($mes == "Task ID is invalid.") {
        	answer("انتهت مهلة الرقم حاول مرة أخرى");
        } else {
        	
            $num = $super["phone"];
            $code = $super["code"];  
  if($code == null) :       
           answer("لم يصل الكود الى الآن تأكد من ان الرقم غير محظور او تم استخدامه");
  else :
            edit("✳️ ⁞ تم شراء الرقم بنجاح!
☎️ ⁞ الرقم: $num
💬 ⁞ الكود: $code
🌀 ⁞ الحالة: مكتملة ✅
💰 ⁞ السعر: ₽ $ex[2]

✅ تم وصول الكود بنجاح. 😉♥️");
            $static['conum'] ++;
            $static[$chat_id]['conum']++;
            $static[$chat_id]['robel']++;
            $static['bot']['balance'] +=  $price;
            save($static,"static");
            $chart[$chat_id]["numbers"][] = $code;
            done($chart);
            unset($info[$chat_id]["checker"]);
             save($info);
            endif;
        }
 #=================================#
    elseif ( $ex[0] == "bandnumber" && $ex[4] == "5sim" ):
        $sim5    =   file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=$ApiKey5sim&action=getStatus&id=$ex[2]");
        $exx    =   explode(":",$sim5);
        if ( $exx[0] == "STATUS_OK" ) {
            $num = $ex[1];
            $code = $exx[1];
            edit("لم يتم الحظر لانك طلبت الكود وتم استلامه في الموقع الرقم : $num \nالكود : $code \nالحالة مكتملة");
            file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=$ApiKey5sim&action=setStatus&status=6&id=$ex[2]");
            $static['conum'] ++;
            $static[$chat_id]['conum']++;
            save($static,"static");
            unset($info[$chat_id]["checker"]);
             save($info);
        }else{
            //عند الحظر
            edit("تم الحظر بنجاح وتمت استعادة اموالك ",$home);
            $point["members"][$check[$chat_id]['mail']]["point"]    += $ex[3];
            save($point, "point");
            file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=$ApiKey5sim&action=setStatus&status=8&id=$ex[2]");
            $static['unconum'] ++;
            $static[$chat_id]['unconum']++;
            save($static,"static");
            unset($info[$chat_id]["checker"]);
             save($info);
        }
           #//////#
           elseif ( $ex[0] == "bandnumber" && $ex[4] == "super" ):
        $url    =   "https://www.supersms.ml/api/getcode?taskid=$ex[2]&secret_key=$api_key_super";
        $super = json_decode(file_get_contents($url), true);
        if ( $super["code"] != null ) {
            $num = $super["phone"];
            $code = $super["code"];
            edit("لم يتم الحظر لانك طلبت الكود وتم استلامه في الموقع الرقم : $num \nالكود : $code \nالحالة مكتملة");
            file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=$ApiKey5sim&action=setStatus&status=6&id=$ex[2]");
            $static['conum'] ++;
            $static[$chat_id]['conum']++;
            save($static,"static");
            unset($info[$chat_id]["checker"]);
             save($info);
        }else{
            //عند الحظر
            edit("تم الحظر بنجاح وتمت استعادة اموالك ",$home);
            $point["members"][$check[$chat_id]['mail']]["point"]    += $ex[3];
            save($point, "point");
            file_get_contents("https://www.supersms.ml/api/releasenumber?secret_key=$api_key_super&phone=$ex[1]");
            $static['unconum'] ++;
            $static[$chat_id]['unconum']++;
            save($static,"static");
            unset($info[$chat_id]["checker"]);
             save($info);
        }
           #//////#
    elseif ( $ex[0] == "bandnumber" && $ex[4] == "man" ):
        $man    =   file_get_contents("http://api.sms-man.com/stubs/handler_api.php?action=getStatus&api_key=$ApiKeySmsMan&id=$ex[2]");
        $sms = explode(":",$man);
            $num = $ex[1];
            $code = $sms[1];  
        if ( $code != null ){//عند استلام الكود في حالة وجوده لكن تم ضغط زر الحظر
            $num = $ex[1];
            edit("لم يتم الحظر لانك طلبت الكود وتم استلامه في الموقع الرقم : $num \nالكود : $code \nالحالة مكتملة");
            file_get_contents("http://api.sms-man.com/stubs/handler_api.php?action=setStatus&api_key=$ApiKeySmsMan&id=$ex[2]&status=6");  
            $static['conum'] ++;
            $static[$chat_id]['conum']++;
            save($static,"static");
            unset($info[$chat_id]["checker"]);
             save($info);
        } else {
            //عند الحظر
            edit("تم الحظر بنجاح وتمت استعادة اموالك ",$home);
            $point["members"][$check[$chat_id]['mail']]["point"]    += $ex[3];
            save($point, "point");
            file_get_contents("http://api.sms-man.com/stubs/handler_api.php?action=setStatus&api_key=$ApiKeySmsMan&id=$ex[2]&status=8"); 
            $static['unconum'] ++;
            $static[$check[$chat_id]['mail']]['unconum']++;
            save($static,"static");
            unset($info[$chat_id]["checker"]);
             save($info);
        }
        exit;
        
        elseif($data == "market_cards") : 
        $json = [];
        $json["inline_keyboard"][]  =   [["text"=>"الــكود 📩","callback_data"=>"card_price"],["text"=>"لسعـــر💲","callback_data"=>"card_amount"],["text"=>"الــكمية 📮","callback_data"=>"elias"]];
        
        foreach ($numbers['cards'] as $code => $card  ) :
        if($code != null){
        $amount = $numbers['cards'][$code]['amount'];
        $price      = $numbers['cards'][$code]['price'];
        $cod        = substr($code, 0,-6)."••••";
        $json["inline_keyboard"][]  =   [["text"=>"$cod","callback_data"=>"nothing"],["text"=>"$price ₽", "callback_data"=>"nothing"],["text"=>"$amount","callback_data"=>"buycard#$price#$amount#$code"]];
        }
        endforeach;
        $json["inline_keyboard"][]  =   [['text'=>'تحديث الصفحة 🔂',"callback_data"=>"market_cards"],['text'=>'القائمة الرئيسية 🏡',"callback_data"=>"home"]];
        bot("editmessagetext",[
            "chat_id"=>$chat_id,
             "message_id" => $message_id,
            "text" => "🛄 إليك متجر الكروت الجاهزة الشحن الخاص بالبوت
⁉️ يمكنك شراء الكرت وشحنه في حساب آخر ♻️
✳️ هذا المتجر مخصص لبيع كروت الشحن فقط ✔️",
            "reply_markup" => json_encode($json)
        ]);
        exit;
  
elseif($data == "fav"):
$json["inline_keyboard"][]  =   [["text"=>"الدولة 🌐","callback_data"=>"hello"],["text"=>"السيرفر 📟","callback_data"=>"hmm"],["text"=>"السعر 💰","callback_data"=>"Alwalidee"]];
foreach($favourite["number"] as $k => $v):
if($k = "5sim"):
$key = $favourite["number"][$k]["key"];
$operator = $favourite["number"][$k]["ope"];
$app         = $favourite["number"][$k]["app"];
else :
$key = $favourite["number"][$k]["key"];
$operator = $favourite["number"][$k]["ope"];
$app         = $favourite["number"][$k]["app"];
endif;
$name      =  $numbers["num"][$key]["name"];
$country   =  $numbers["num"][$key]["site-name"];
$ser          =  $numbers["num"][$key]["ser"];
$key         =  $numbers["num"][$key]["con-key"];
if($ser == "5sim") {
	$price = json_decode(file_get_contents("https://5sim.net/v1/guest/products/$country/$operator"))->$app->Price ; 
    $json["inline_keyboard"][]  =   [["text"=>"$name","callback_data"=>"hello"],["text"=>"$operator" ,"callback_data"=>"hmm"],["text"=>"$price ₽","callback_data"=>"B-N#$key#$app#$price#$operator"]];
    
   } else {
            	$chart = json_decode(file_get_contents("http://api.sms-man.com/stubs/handler_api.php?action=getPrices&api_key=$ApiKeySmsMan&country=$country&service=$app"));
                $cost   =  $chart->$country->cost ;
                $price = $info["nesbah"] / 100 * $cost + $cost;
                $json["inline_keyboard"][]  =   [["text"=>"$name","callback_data"=>"hello"],["text"=>"سيرفر 2" ,"callback_data"=>"hmm"],["text"=>"$price ₽","callback_data"=>"B-N#$key#$app#$price"]];   
 }
endforeach;
$json["inline_keyboard"][]  =   [["text"=>"القائمة الرئيسية 🏡","callback_data"=>"home"]];
 bot("editmessagetext",[
            "chat_id"=>$chat_id,
            "text"=>"😁🌸 ⌯ الدولة: $name
🤧♥️ ⌯ التطبيق : $ex[2]. ☑️

☑️ ⌯ إختر احد السيرفرات للشراء منه. ☺️🌸

🛍️ ⌯ كل سيرفر يقوم بتوفير عدد من الارقام وكل سيرفر له سعر خاص به. 😌🌼" ,
            "message_id" => $message_id,
            "reply_markup" => json_encode($json)
        ]);              
        
exit;       
      
        elseif($data == "cCard") :
             	if($chart[$chat_id]["cards"] != null) :
             	foreach($chart[$chat_id]["cards"] as $val):
                 $cards .= "`$val`" . "\n";
                 endforeach;
       edit("سجل الكروت الذي قمت بشحنها  \n $cards");
       else : 
       answer("أنت لم تقم بشحن كرت الى الآن 🤔🤔");
       endif;
       exit;
       
elseif($data == "cNumber") :
             	if($chart[$chat_id]["numbers"] != null) :
foreach($chart[$chat_id]["numbers"] as $val):
                 $nums .= "`$val`" . "\n";
                 endforeach;
       edit("سجل الأرقام الذي قمت بشرائها \n $nums");
else : 
       answer("❌ لا يوجد سجل لك! 👌 لم تقم بشراء أي رقم حتى الآن");
       endif;
       exit;
       elseif($data == "cCardBuy"):
       if($chart[$chat_id]["buycards"] != null) :
             	foreach($chart[$chat_id]["buycards"] as $val):
                 $buycards .= "`$val`" . "\n";
                 endforeach;
       edit("سجل الكروت الذي قمت بشرائها \n $buycards");
       else : 
       answer("❌ لا يوجد سجل لك! 👌 لم تقم بشراء أي كرت حتى الآن");
       endif;
       exit;
    endif;
    
    
#=========================================================================#
else:
    die("@n_r_sy");
endif;
include("login.php");

