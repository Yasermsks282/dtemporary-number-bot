<?php
$tex = explode(" " ,$text);
@$hom=[[["text"=>"إلغاء ⛔","callback_data"=>"settings"]]]; //home
@$backk=[[["text"=>"رجوع ⏯","callback_data"=>"settings"]]]; //home






if($data == "login_pannel") :
$info["members"][$chat_id]["mode"] =   null;
        $info[$chat_id]['mode'] = null; 
        save($info);
        edit( " 
🥇 •  هلاً بك عزيزي [$fname](tg://user?id=$chat_id)

🎗 •  في NUMBER VIP الأفضل في التليجرام. 
💎 •  يقوما البوت بتوفير أرقام وهمية لأكثر من 180 دولة  ولتفعيل برامج التواصل الإجتماعي مثل واتساب، فيسبوك..الخ ورشق جميع السويشال ميدميا.. انستجرام.. تيليجرام.. تويتر.. الخ.. وبأفضل الأسعار ✅

🛍️  • أسعار رخيصة، توفر ممتاز، دعم متواجد، خدمة سريعة ☑️.
                مــع NUMBER VIP
🎖 •  اتقان - سرعة - اسعار منافسه
" , [
            [
                ["text"=>'☑️ ⌯ تسجيل الدخول.',"callback_data"=>"login"],
				["text"=>"♻️ ⌯ إنشاء حساب.","callback_data"=>"creatacount"],
            ],
            [
                ["text"=>"📊 ⌯ الإحصائيات.","callback_data"=>"botstatic"],
                ["text"=>"❓⌯ التعليمات.","callback_data"=>"infouse"]
            ],
            [
                ["text"=>"⁞ قناة البوت📡","url"=>"t.me/NUMBERVIPSMS"],
                ["text"=>"🙅🏽‍♂⌯ الادارة.","url"=>"t.me/n_r_sy"]
            ],                       
            [
                ['text'=>"📮 ⌯ تواصل معنا.",'callback_data'=>"help"]
            ]
            ]);      
        exit;
        
        
exit;
elseif($data == "creatacount") :
$pass = rand(1, 100000);
            if($check[$chat_id]["mail"] == null) {        	
            $info[$chat_id]["check"] = $pass;
            save($info);
        
           $keyboard = keys("",$key);
           bot('editmessagetext',[
           'chat_id' => $chat_id,
           'message_id' => $message_id,
           'text' =>"⭕️ للأمان 
🔆 | سيتم التحقق من أنك لست روبوت
🔑 | قم بإدخال كلمة المرور التالية :- 

🗝 * $pass * 🗝",
'parse_mode' => "markdown",
          reply_markup => $keyboard,
    ]);
} else { 
       	answer("لقد قمت بانشاء حساب مسبقا");
       }
    exit;

elseif($ex[0] =="ok" && $info[$chat_id]["stop"] == null) :
$co = $ex[1];
$co .= $ex[2];
$pass = $info[$chat_id]["check"];
         if($ex[1] == "-----")$co="";
         $keyboard = keys($co,$key);
         bot('editmessagetext',[
         'chat_id' => $chat_id,
         'message_id' => $message_id,
         'text' =>"⭕️ للأمان 
🔆 | سيتم التحقق من أنك لست روبوت
🔑 | قم بإدخال كلمة المرور التالية :- 

🗝 * $pass * 🗝",
'parse_mode' => "markdown",
          reply_markup => $keyboard,
    ]);
 exit;
  
elseif(preg_match("/(del)#(\d+)/",$data,$res) && $info[$chat_id]["stop"] == null) :
         $pass = $info[$chat_id]["check"];
         $result = substr($res[2],0,strlen($res[2])-1);
         $keyboard = keys($result,$key);
         bot(editmessagetext,[
         chat_id=>$chat_id,
         'message_id' => $message_id,
         text =>"⭕️ للأمان 
🔆 | سيتم التحقق من أنك لست روبوت
🔑 | قم بإدخال كلمة المرور التالية :- 
 
🗝 * $pass * 🗝",
        "reply_markup" => $keyboard
  ]);
 exit;

elseif(preg_match("/(true)#(\d+)/",$data,$pass) && $info[$chat_id]["stop"] == null) :
           $password = rand(1, 100000);
           $email = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOBQRSTUVWXYZ"), 1, 8);
           $email = "$email@sms.net";
if($pass[2] == $info[$chat_id]["check"]){
edit("تم التحقق بنحاح ✅
وتم إنشاء الحساب ❇️

🅿️ | البربد الألكتروني : *$email*
🔑 | كلمة المرور  : *$password*

🛑 ملاحظة يمكنك تغيير كلمة المرور بأي وقت",[
[
                ["text"=>'¦ تسجيل الدخول ♻️',"callback_data"=>"home"]
            ],
            ]);      
        

unset($info[$chat_id]["check"]);
unset($info[$chat_id]["mode"] );
save($info);
$check[$chat_id]["mail"] = $email;
$check[$chat_id]["pass"] = $password;
$check[$check[$chat_id]["mail"]]["idd"] = $chat_id;
save($check , "check");
exit;
} else {
answer("خطأ يرجى المحاولة مجددا ☹");
}
exit;
       
       	
        elseif($data == "login"):
        if($check[$chat_id]["mail"] != null){
        $email = $check[$chat_id]["mail"];
        edit("🗝 | يمكنك تسجيل الدخول عبر حسابك

🔘 | اضغط على تسجيل الدخول ✅" , [
           [
                
                ["text"=>"$email","callback_data"=>"null"]
           ],
           [
                ["text"=>"تسجيل الدخول 🔘","callback_data"=>"home"]
            ]
        ]);
      } else { 
      	answer("لم تقم بإنشاء حساب 🙄");
      }
        
        elseif($data == "log") :
        $info[$chat_id]["stop"] = "!";
        save($info);
          $keyboard = keys("",$key);
         bot('editmessagetext',[
         'chat_id' => $chat_id,
         'message_id' => $message_id,
         'text' => "الرجاء إدخال كلمة المرور 🔑

🎛 لنتأكد من أنك صاحب الحساب ☎️",
          reply_markup => $keyboard,
    ]);
       
     elseif($ex[0] == "ok" && $info[$chat_id]["stop"] != null) :
     $co = $ex[1];
     $co .= $ex[2];
         if($ex[1] == "-----")$co="";
        $keyboard = keys($co,$key);
         bot(editmessagetext,[
         'message_id' => $message_id,
         'chat_id' => $chat_id,
         'text' => "الرجاء إدخال كلمة المرور 🔑

🎛 لنتأكد من أنك صاحب الحساب ☎️ ",
          'reply_markup' => $keyboard,
    ]);
    
  exit;
       elseif(preg_match("/(del)#(\d+)/",$data,$res) && $info[$chat_id]["stop"] != nul) :
       $result = substr($res[2],0,strlen($res[2])-1);
       $keyboard = keys($result,$key);
       bot(editmessagetext,[
       'message_id' => $message_id,
        'chat_id' => $chat_id,
         'text' =>"الرجاء إدخال كلمة المرور 🔑

🎛 لنتأكد من أنك صاحب الحساب ☎️",
         'reply_markup' => $keyboard
  ]);
exit;

elseif(preg_match("/(true)#(\d+)/",$data,$pass) && $info[$chat_id]["stop"] != nul) :
         if($pass[2] == $check[$chat_id]["pass"]){
         edit("جار التحقق ...");
         edit("تم التحقق بنجاح ✔" , [
     [
         ["text"=>'⁞ متابعة الدخول ✅',"callback_data"=>"home"]
     ]
   ]);
        unset($info[$chat_id]["stop"]);
        save($info);
} else {
answer("خطأ يرجى المحاولة مجددا ☹");
}
exit;
       
       elseif($data == "infouse") :
       edit("
- مرحباً عزيزي.

- اولاً: هذا البوت مخصص لعمل ارقام وهمية لجميع مواقع التواصل الإجتماعي.
- ثانياً: هذا البوت لايتحمل مسؤولية الارقام في حالة أنها انسرقت او انحظرت , بمعنى: البوت غير مسؤول عن الرقم بعد شرائه.
- يرجى عدم استعمال الارقام في أشياء قد تغضب الله عزوجل او تنحرف عن المسار الاسلامي كالإختراقات والإبتزازات والمعاكسات وغيرها.

- تعليمات بسيطة حول البوت:

- اولاً: البوت يقوم بشراء الأرقام تلقائياً من موردين بالجملة, ثم يقوم بتجزئتها وبيعها لعملائنا الأكارم, لذلك ياعزيزي نحن لا نستطيع فحص جميع الارقام في حالة كانت مستخدمة او جديدة, ببساطه, يمكنك إلغاء الارقام المستخدمة من قبل وشراء الارقام الجديده فقط.
- ثانياً: قد لاتصل الأكواد الى بعض الأرقام, لذلك ياعزيزي يمكنك دائماً إستخدام واتساب أعمال تم نشره في قناتنا على التيليجرام, [إضغط هنا](https://t.me/NUMBERVIPSMS).

- ثالثاً: يوجد نظام تصنيف في حالة كنت تبحث عن أرقام مميزة, تبحث عن رقم مختار, تلعب بالارقام (شراء,الغاء,شراء,إلغاء..الخ), سوف يتم خصم رصيد حسابك كاملاً تلقائياً.

- تعليمات بسيطة ومبدأيه:

- عند شراء رقم, قم بفحصه أولاً, ماإذا كان الرقم جديداً أو لا.
- لفحص الرقم, أضغط على زر (رؤية الرقم في واتساب) بعد شراء الرقم, سيقوم بتوجيهك الى الواتساب, في حالة قال لك ( الرقم ليس في واتساب ) هذا يعني ان الرقم جديد, ولم يستخدم في واتساب من قبل.
- اما في الحالات الأخرى فهذا يعني أن الرقم مستخدم في واتساب ولا نتحمل مسؤولية تفعيله في اي حال من الاحوال.

- أما بالنسبة لوصول الكود, بعض الارقام لايصل لها الكود احياناً, لذلك عليك اولاَ استخدام نسخه واتساب اعمال خاصه بطلب الأكواد ام نشرها بالفعل على قناتنا [إضغط هنا لتحميلها](https://t.me/SIM5SC/12).
- في حالة انه لم يصل الكود في هذه النسخه, قم بعمل ارسال رسالة مجدداً في الواتساب وانتظر نصف دقيقة واضغط تحديث, في حالة انه لم يصل بعد, قم بإلغائه وشرا رقم آخر.

- للإستفسار تواصل معنا: [@n_r_sy]
" , [
           [
                ['text'=>"رجوع ⏪",'callback_data'=>"login_pannel"]
           ],
           [
                ['text'=>"❗️تواصل مع الإدارة 🎬",'callback_data'=>"help"]
            ]
      ]);
    exit;
       
elseif($data == "settings") :
edit("¦ - 🏆 الاعددادات الخاصه لبوت  𝙏𝘼𝙉𝙂𝙍𝙊
¦ - 🪗يرجئ التحكم في الازرار بالاسفل .
" , [
          [
                ['text'=>"¦ - تغيير كلمه السر ??.",'callback_data'=>"chang"]],
         [
                ['text'=>"¦ - معلومات حسابي 🗞.",'callback_data'=>"inf"]],
         [
                ['text'=>"¦ - مسح سجل الارقام 🗑." ,'callback_data'=>"del_num"]],
         [
                ['text'=>"¦ - حذف حسابي ❎.",'callback_data'=>"delete_account"]],
         [
                ['text'=>"¦ - سجل حسابك الشخصي♻️.",'callback_data'=>"my_chart"]], 
         [
                ['text'=>"¦ - تسجيل الخروج ❌.",'callback_data'=>"login_pannel"]],
         [
                ['text'=>"رجوع ⏪",'callback_data'=>"home"]]
         ]);
       exit;
elseif($data == "inf") :
 edit( "👨‍✈️ ⁞  اهلا بك:
 [$fname](tg://user?id=$chat_id)  🤍🌺

🧩 ⁞  ايدي حسابك: $id 🆔
🏛️ ⁞  رصيدك: ₽ " . $info["members"][$check[$chat_id]['mail']]["point"] . " 💰
☎️ ⁞ الإيميل : " .$check[$chat_id]['mail'] . "
🔑 ⁞ كلمة المرور : " . $check[$chat_id]['pass'] , $hom);
exit;

elseif($data == "chang"):
edit("ارسل كلمة المرور الجديدة 🗝",$hom);
$info[$chat_id]["mode"] = "chang";
save($info);

elseif(preg_match("/\d+/",$text) && $info[$chat_id]["mode"] == "chang") :
send("تم تغيير كلمة المرور بنجاح ✅",$backk);
$check[$chat_id]["pass"] = $text;
save($check,"check");
unset($info[$chat_id]["mode"]);
save($info);

elseif($data == "del_num"):
edit("هل أنت متأكد من أنك تريد الحذف سيتم حذف سجل كل الأرقام الذي قمت بشرائها 🙄" , [
    [
         ['text'=>"نعم 😎",'callback_data'=>"yesIneed"],
         ['text'=>"إلغاء ⛔",'callback_data'=>"settings"]],
    ]);
  exit;
  
  elseif($data == "yesInedd"):
  edit("تم حذف الحساب ✅",$backk);
  unset($get[$chat_id]["numbers"]);
  done($get);
  
  elseif($data == "delete_account"):
edit("سيتم حذف حسابك من البوت 🙄 هل تود المتابعة" , [
    [
         ['text'=>"نعم ??",'callback_data'=>"yes"],
         ['text'=>"إلغاء ⛔",'callback_data'=>"settings"]],
    ]);
  exit;
  
  elseif($data == "yes"):
  edit("تم حذف الحساب بنجاح ✔",$backk);
  unset($check[$chat_id]["mail"]);
  unset($check[$chat_id]["pass"]);
  save($check , "check");
  
  elseif($data == "my_chart") :
  edit("إليك سجل حسابك الشخصي 👇👇",$backk);
  bot('senddocument',[ 'chat_id'=>$chat_id,
      'document'=>new CURLFile("data/$chat_id.json")
     ]);
     
     elseif( $data == "collect") :      
        $link = "https://t.me/$bot?start=".jelloAppend(encrypt($check[$chat_id]['mail']),'en');
        edit("☑️ اهلا بك عزيزي 🖤☺️

📬 الميزة هذي تقدم لك كسب رصيد مجانا وذلك عبر رابط إحالتك الذي ستقوم بنشرة عند أصدقائك وعندما يقوم أحد أصدقائك ب التسجيل في البوت عبر رابط إحالتك سيكون من ضمن فريقك في البوت وستحصل على $setCoinURL روبل 💸

💠 رابط إحالتك: 
$link
🫂 عدد أعضاء فريقك: " . 
$refral[$check[$chat_id]["mail"]]["invit"] , 
            [                
                [["text"=>"▼ القائمة الرئيسيه 🏡 ▲","callback_data"=>"home"]
            ],
]);
exit;

elseif($tex[0] == "/start") : 
$link = decrypt(jelloAppend($tex[1],'de')); 
$art = $check[$link]["idd"];
send($check[$link]["idd"] . " elias"); 
if($refral[$chat_id]["ref"] == null && $link != $check[$check[$chat_id]["mail"]]["idd"]) {                
$refral[$link]["invit"]++;         
###$point["members"][$link]["point"] += $setCoinURL;
$point["refrals"][$chat_id] = $link;
 save($point , "point");
 /* 
 Use a handle / $point["refrals"][$chat_id] /
 when charging
examble :-
if(Charge){
	if($point["refrals"][$chat_id] != null){
		$linkID = $point["refrals"][$chat_id];
		$point["members"][$linkID]["point"] += $setCoinURL;
		save($point , "point");
	}
}
 */
 
#$refral[$chat_id]["ref"] = $link;         
save($refral , "refral"); 
sendd($link , "قام " . "[$chat_id](tg://user?id=$chat_id)  وحصلت على $setCoinURL روبل 🎉" . " بالدخول إلى فريقك عدد أعضاء فريقك الحالي " . $refral[$link]["invit"] ); send("شكرا لإنضمامك إلى البوت الخاص بنا يمكنك إنشاء حساب والتمتع بخدماتنا 
$link () $art" , [            
        [                 
              ["text"=>" 🔘 اضغط هنا للدخول للبوت🏅","callback_data"=>"login_pannel"]             
        ]     
   ]); 
}
exit;

elseif($data == "search") :
edit("☑️ للبحث ارسل نداء أو رمز الدوله التي تريد العثور عليها 😉

🔍 كمثال: نداء اليمن: 967 | نداء روسيا: 7 | نداء كازاخستان: +7 | نداء أمريكا: +1 | نداء كندا: 1000" , $home);
$info[$chat_id]["mode"] = "search";
save($info); exit;

elseif($tex[0] == "نداء" && $info[$chat_id]["mode"] == "search") :
if($numbers["num"][$tex[1]] != null):
              $name     = $numbers["num"][$tex[1]]["name"];
              $country  = $numbers["num"][$tex[1]]["site-name"];
              $web        = $numbers["num"][$tex[1]]["ser"];
              $json["inline_keyboard"][]  =   [["text"=>"الدولة 🌐","callback_data"=>"hello"],["text"=>"السيرفر 📟","callback_data"=>"hmm"],["text"=>"السعر 💰","callback_data"=>"Alwalidee"]];
if($web == "5sim"){ 
foreach($info["operator"] as  $pk => $hmm ):
               $opname = $info["operator"][$pk]["name"] ;
               $opvalue = $info["operator"][$pk]["val"] ; 
	           $pric = json_decode(file_get_contents("https://5sim.net/v1/guest/products/$country/$opvalue"))->whatsapp->Price ; 
	if($pric == null):
	          $json["inline_keyboard"][] = null;
	else: 
               $price = $info["nesbah"] / 100 * $pric +$pric;
               $json["inline_keyboard"][]  =   [["text"=>"$name","callback_data"=>"hello"],["text"=>"$opname","callback_data"=>"hmm"],["text"=>"$price ₽","callback_data"=>"B-N#$tex[1]#whatsapp#$web#$price#$opvalue"]];
    endif;
endforeach;
} else {
                $chart = json_decode(file_get_contents("http://api.sms-man.com/stubs/handler_api.php?action=getPrices&api_key=$ApiKeySmsMan&country=$country&service=wa"));
                $cost   =  $chart->$country->cost ;
                $price = $info["nesbah"] / 100 * $cost + $cost;
                $json["inline_keyboard"][]  =   [["text"=>"$name","callback_data"=>"hello"],["text"=>"سيرفر 2⃣","callback_data"=>"B-N#$tex[1]#wa#$web#$price"],["text"=>"$price ₽","callback_data"=>"B-N#$tex[1]#wa#$web#$price"]];
}
$json["inline_keyboard"][]  =   [["text"=>"القائمة الرئيسية 🏡","callback_data"=>"home"]];
bot("sendmessage",[
            "chat_id"=>$chat_id,
            "text"=>"$country $opvalue $web $name",
            "message_id" => $message_id,
            "reply_markup" => json_encode($json)
        ]);
else :
send("لا يتوفر أرقام لهذه الدولة او أنه لم يتم إدراجها من قبل الأدمن 🤷‍♂️",$home);
unset($info[$chat_id]['mode']);
save($info);
endif;

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
        
endif;       