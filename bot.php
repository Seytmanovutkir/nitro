<?php
//Bu kod @PHP_New kanali orqali tarqatildi

set_time_limit(0);

ob_start();
//Bu kod @PHP_New kanali orqali tarqatildi

$API_KEY = '1451101893:AAEtx1PS_NV3CtArocVSU9-fqGdEJwgLliA';

define('API_KEY', $API_KEY);
function bot($method, $datas = [])
{
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}

function sendmessage($php_new1, $php_new)
{
    bot('sendMessage', [
        'chat_id' => $php_new1,
        'text' => $php_new,
        'parse_mode' => "MarkDown"
    ]);
}

function deletemessage($php_new1, $message_id)
{
    bot('deletemessage', [
        'chat_id' => $php_new1,
        'message_id' => $message_id,
    ]);
}

function sendaction($php_new1, $action)
{
    bot('sendchataction', [
        'chat_id' => $php_new1,
        'action' => $action
    ]);
}

function Forward($KojaShe, $AzKoja, $KodomMSG)
{
    bot('ForwardMessage', [
        'chat_id' => $KojaShe,
        'from_chat_id' => $AzKoja,
        'message_id' => $KodomMSG
    ]);
}

function sendphoto($php_new1, $photo, $action)
{
    bot('sendphoto', [
        'chat_id' => $php_new1,
        'photo' => $photo,
        'action' => $action
    ]);
}

function objectToArrays($object)
{
    if (!is_object($object) && !is_array($object)) {
        return $object;
    }
    if (is_object($object)) {
        $object = get_object_vars($object);
    }
    return array_map("objectToArrays", $object);
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$channel_post = $update->message->channel_post;
$code = file_get_contents("data/code.txt");
$code2 = file_get_contents("data/code2.txt");
$chid = $update->channel_post->message->message_id;
$php_new1 = $message->chat->id;
$message_id = $message->message_id;
$from_id = $message->from->id;
$c_id = $message->forward_from_chat->id;
$php_new_id = $update->message->forward_from->id;
$php_new_chat = $update->message->forward_from_chat;
$php_new_username = $update->message->forward_from_chat->username;
$php_new_chat_msg_id = $update->message->forward_from_message_id;
@$shoklt = file_get_contents("data/$php_new1/shoklat.txt");
@$penlist = file_get_contents("data/pen.txt");
$php_new = $message->text;
@mkdir("data/$php_new1");
@$ali = file_get_contents("data/$php_new1/ali.txt");
@$list = file_get_contents("users.txt");

$ADMIN = "854021271"; //ADMIN Id si 1
$bot = "Prasmotrbot_robot"; //botiz useri @ siz yozing 2
$bkanal = "phpkodlar_baza"; //kanaliz useri @ siz yozing 3
$badmin = "UtkirSeytmanov_IIV_TM"; //admin useri @ siz yozing 4 TAMOM

$channel = file_get_contents("data/channel.txt");
$channe2l = file_get_contents("data/channel2.txt");
$chatid = $update->callback_query->message->chat->id;
$php_new1 = $message->chat->id;
$data = $update->callback_query->data;
$message_id2 = $update->callback_query->message->message_id;
$fromm_id = $update->inline_query->from->id;
$fromm_user = $update->inline_query->from->username;
$inline_query = $update->inline_query;
$query_id = $inline_query->id;
$message_id222 = $update->message->message_id;
$fatime = date('H:i:s', strtotime('2 hour'));
$fadate = date('d-M Y',strtotime('2 hour'));
$join = file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=@$bkanal&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: vvssr"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendMessage', [
'chat_id'=>$php_new1,
'text'=>"👋┇ Salom bot xush kelibsiz

🌟┇ Botdan foydalanish uchun kanalimizga a'zo boling

📡┇Kanalimiz
[@$bkanal]👈
👆👆👆

📌┇ A'zo bolib /start ni bosin ",
'reply_to_message_id'=>$msid,
'reply_markup' => json_encode(['inline_keyboard' => [
[['text' => "👥A`zo bo`lish", 'url' => "t.me/$bkanal"]],]])
]);return false;}

$ptn = json_encode([
    'inline_keyboard' => [
        [
            ['text' => "1⃣", 'callback_data' => "c1"], ['text' => "2⃣", 'callback_data' => "c2"], ['text' => "3⃣", 'callback_data' => "c3"]
        ],
        [
            ['text' => "4⃣", 'callback_data' => "c4"], ['text' => "5⃣", 'callback_data' => "c5"], ['text' => "6⃣", 'callback_data' => "c6"]
        ],
        [
            ['text' => "7⃣", 'callback_data' => "c7"], ['text' => "8⃣", 'callback_data' => "c8"], ['text' => "9⃣", 'callback_data' => "c9"]
        ],
        [
            ['text' => "Tasdiqlash✅", 'callback_data' => "chk"], ['text' => "0⃣", 'callback_data' => "c0"]
        ],
        [
            ['text' => "🔙Orqaga qaytish", 'callback_data' => "home"]
        ],
    ]
]);
////_________
if ($php_new == "/start") {
        $user = file_get_contents('users.txt');
        $members = explode("n", $user);
        if (!in_array($from_id, $members)) {
            $add_user = file_get_contents('users.txt');
            $add_user .= $from_id . "n";
            file_put_contents("data/$php_new1/membrs.txt", "0");
            file_put_contents("data/$php_new1/shoklat.txt", "10");
            file_put_contents('users.txt', $add_user);
        }
        file_put_contents("data/$php_new1/ali.txt", "no");
        sendAction($php_new1, 'typing');
        bot('sendmessage', [
            'chat_id' => $php_new1,
            'text' => "*👋Salom dostim (tashrifingiz uchun rahmat)
            
Siz ushbu botda kanalingiz postni osongina oshirish uchun ushbu botdan foydalanishingiz mumkin

Botni kanalizga admin qiling bumasa ishlamidi

Ishni boshlash uchun quyidagi variantlardan birini tanlang*",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "💎Ochko to'plash💎", 'callback_data' => "a"]
                    ],
                    [
                        ['text' => "👥Referal", 'callback_data' => "b"], ['text' => "👤Account", 'callback_data' => "c"]
                    ],
                    [
                        ['text' => "👁Buyurtma", 'callback_data' => "e"], ['text' => "🎁Sovg'a", 'callback_data' => "d"]
                    ],
                    [
                        ['text' => "🛍Dokon", 'callback_data' => "f"], ['text' => "🚀Yordam", 'callback_data' => "g"]
                    ],
                    [
                        ['text' => "🔎Kuzatuv", 'callback_data' => "h"], ['text' => "🎁Sovg'a kodi", 'callback_data' => "k"]
                    ],
                    [
                        ['text' => "💰Kunlik bonus💰", 'callback_data' => "j"]
                    ],

                ]
            ])
        ]);
    } elseif (strpos($penlist, "$from_id")) {
        SendMessage($php_new1, "Hey, azizim, biz serverni to'sib qo'ydik, yana xabarlar yo'q");
    } elseif (strpos($php_new, '/start') !== false && $php_new_username == null) {
        $newid = str_replace("/start ", "", $php_new);
        if ($from_id == $newid) {
            bot('sendMessage', [
                'chat_id' => $php_new1,
                'text' => "Sizning havolangizga kira olmaysiz!",
            ]);
        } elseif (strpos($list, "$from_id") !== false) {
            SendMessage($php_new1, "Siz allaqachon ushbu botga azo bo'lgansiz va a'zolik aloqangiz bilan bot a'zosi bo'la 😑 ");
        } else {
            sendAction($php_new1, 'typing');
            @$sho = file_get_contents("data/$newid/shoklat.txt");
$ran = rand(5, 20);
            $getsho = $sho + $ran;
            file_put_contents("data/$newid/shoklat.txt", $getsho);
            @$sea = file_get_contents("data/$newid/membrs.txt");
            $getsea = $sea + 1;
            file_put_contents("data/$newid/membrs.txt", $getsea);
            $user = file_get_contents('users.txt');
            $members = explode("n", $user);
            if (!in_array($from_id, $members)) {
                $add_user = file_get_contents('users.txt');
                $add_user .= $from_id . "n";
                file_put_contents("data/$php_new1/membrs.txt", "0");
                file_put_contents("data/$php_new1/shoklat.txt", "10");
                file_put_contents('users.txt', $add_user);
            }
            file_put_contents("data/$php_new1/ali.txt", "No");
            sendmessage($php_new1, "تبریک دوست عزیز شما با دعوت کاربر $newid عضو این ربات شده اید😃");
            bot('sendmessage', [
                'chat_id' => $php_new1,
          'text' => "*👋Salom dostim (tashrifingiz uchun rahmat)
            
Siz ushbu botda kanalingiz postni osongina oshirish uchun ushbu botdan foydalanishingiz mumkin

Botni kanalizga admin qiling bumasa ishlamidi

Ishni boshlash uchun quyidagi variantlardan birini tanlang*",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "💎Ochko to'plash💎", 'callback_data' => "a"]
                    ],
                    [
                        ['text' => "👥Referal", 'callback_data' => "b"], ['text' => "👤Account", 'callback_data' => "c"]
                    ],
                    [
                        ['text' => "👁Buyurtma", 'callback_data' => "e"], ['text' => "🎁Sovg'a", 'callback_data' => "d"]
                    ],
                    [
                        ['text' => "🛍Dokon", 'callback_data' => "f"], ['text' => "🚀Yordam", 'callback_data' => "g"]
                    ],
                    [
                        ['text' => "🔎Kuzatuv", 'callback_data' => "h"], ['text' => "🎁Sovg'a kodi", 'callback_data' => "k"]
                    ],
                    [
                        ['text' => "💰Kunlik bonus💰", 'callback_data' => "j"]
                    ],
                    ]
                ])
            ]);
            SendMessage($newid, "Tabriklaymiz, hozir sizning maxsus havolangizga bir kishi botga kirdi😇

Sizda 10 bepul tanga bor. ");
        }
    }
    //Bu kod @PHP_New kanali orqali tarqatildi
    elseif ($data == "home") {
    unlink("cod/$chatid.txt");
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Bosh menyuga qaytingiz",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "no");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "
*Asosiy menyuga qaytardingiz
🔻Quyidagi variantlardan birini tanlang*🔻
",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "💎Ochko to'plash💎", 'callback_data' => "a"]
                    ],
                    [
                        ['text' => "👥Referal", 'callback_data' => "b"], ['text' => "👤Account", 'callback_data' => "c"]
                    ],
                    [
                        ['text' => "👁Buyurtma", 'callback_data' => "e"], ['text' => "🎁Sovg'a", 'callback_data' => "d"]
                    ],
                    [
                        ['text' => "🛍Dokon", 'callback_data' => "f"], ['text' => "🚀Yordam", 'callback_data' => "g"]
                    ],
                    [
                        ['text' => "🔎Kuzatuv", 'callback_data' => "h"], ['text' => "🎁Sovg'a kodi", 'callback_data' => "k"]
                    ],
                    [
                        ['text' => "💰Kunlik bonus💰", 'callback_data' => "j"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "a") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Ball yigish bolimidasiz",
            'show_alert' => false
        ]);
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Ball yig'ish bo'limiga xush kelibsiz


Bu erda kanalimizga tashrif buyurib, har bir postning ostidagi `Pul` tugmasini bosish orqali pul topishingiz mumkin.
Kanaldagi faoliyatingiz robot bilan birlashtirilgan bo'lib, sizning hisobingizga robotda darhol kirish pullari yuboriladi.
Ko'rsatilgan reklamalar kanaliga kirish uchun quyidagi  (Kanalga Kirish tugmasi)  bosishingiz mumkin ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "👁‍🗨Kanalga kirish", 'url' => "https://t.me/$bkanal"]
                    ],
                    [
                        ['text' => "🔙Orqaga qaytish", 'callback_data' => "home"]
                    ]
                ]
            ])
        ]);
    } elseif ($data == "k") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Sovg'a kodi bolimidasiz",
            'show_alert' => false
        ]);
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Quyidagi klaviatura yordamida pulni oshirish uchun kanalga yuborilgan kodni yuboring
Keyin (Tasdiqlash) tugmasini bosing, ",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c1") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "1");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kiritilgan kod:
$cod",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c2") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "2");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kiritilgan kod:
$cod
",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c3") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "3");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kiritilgan kod:
$cod
",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c4") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "4");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kiritilgan kod:
$cod
",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c5") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "5");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kiritilgan kod:
$cod",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c6") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "6");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kiritilgan kod:
$cod",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c7") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "7");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kiritilgan kod:
$cod",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c8") {
        $fromm_id = $update->inline_query->from->id;
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "8");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kiritilgan kod:
$cod",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c9") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "9");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kiritilgan kod:
$cod",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c0") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "0");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kiritilgan kod:
$cod",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "chk") {
        $fromm_id = $update->inline_query->from->id;
        $cod = file_get_contents("cod/$chatid.txt");
        $code2 = file_get_contents("data/code2.txt");
        if ($cod == $code && $cod != null) {
            @$sho = file_get_contents("data/$chatid/shoklat.txt");
            $getsho = $sho + $code2;
            file_put_contents("data/$chatid/shoklat.txt", $getsho);
            unlink("cod/$chatid.txt");
            file_put_contents("data/code.txt", "");
            file_put_contents("data/code2.txt", "");
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Sovg'a kodi bilan tabriklaymiz,
        $code2 kodidan olingan tangalar soni  ",
                'show_alert' => true
            ]);
            bot('sendMessage', [
                'chat_id' => $channel2,
                'text' => "$codi kodi o'chirib qo'yildi
 
 By: 👇
🆔: $chatid
 
Soat: $fatime

  ",

            ]);
            file_put_contents("data/$chatid/ali.txt", "no");
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "
*Asosiy menyuga qaytardingiz
🔻Quyidagi variantlardan birini tanlang*🔻
",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ['text' => "💎Ochko to'plash💎", 'callback_data' => "a"]
                    ],
                    [
                        ['text' => "👥Referal", 'callback_data' => "b"], ['text' => "👤Account", 'callback_data' => "c"]
                    ],
                    [
                        ['text' => "👁Buyurtma", 'callback_data' => "e"], ['text' => "🎁Sovg'a", 'callback_data' => "d"]
                    ],
                    [
                        ['text' => "🛍Dokon", 'callback_data' => "f"], ['text' => "🚀Yordam", 'callback_data' => "g"]
                    ],
                    [
                        ['text' => "🔎Kuzatuv", 'callback_data' => "h"], ['text' => "🎁Sovg'a kodi", 'callback_data' => "k"]
                    ],
                    [
                        ['text' => "💰Kunlik bonus💰", 'callback_data' => "j"]
                    ],
                    ]
                ])
            ]);
        } else {
            unlink("cod/$chatid.txt");
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Kiritilgan kod to'g'ri emas yoki allaqachon ishlatilgan🖤",
                'show_alert' => true
            ]);
            file_put_contents("data/$chatid/ali.txt", "no");
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "
*Asosiy menyuga qaytardingiz
🔻Quyidagi variantlardan birini tanlang*🔻
",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ['text' => "💎Ochko to'plash💎", 'callback_data' => "a"]
                    ],
                    [
                        ['text' => "👥Referal", 'callback_data' => "b"], ['text' => "👤Account", 'callback_data' => "c"]
                    ],
                    [
                        ['text' => "👁Buyurtma", 'callback_data' => "e"], ['text' => "🎁Sovg'a", 'callback_data' => "d"]
                    ],
                    [
                        ['text' => "🛍Dokon", 'callback_data' => "f"], ['text' => "🚀Yordam", 'callback_data' => "g"]
                    ],
                    [
                        ['text' => "🔎Kuzatuv", 'callback_data' => "h"], ['text' => "🎁Sovg'a kodi", 'callback_data' => "k"]
                    ],
                    [
                        ['text' => "💰Kunlik bonus💰", 'callback_data' => "j"]
                    ],
                    ]
                ])
            ]);
        }
    } elseif ($data == "b") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Referal bolimidasiz",
            'show_alert' => false
        ]);
        bot('sendmessage', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Prosmotorni oshiring

Kanalingizda postlarni kam korilishidan charchadingizmi?

Odamlar sizning kanalingiz aktiv ekanligini biladimi?

Kanalingizdagi postlar prosmotrni kotarishni xohlaysizmi? ✫😱

Siz bular uchun tayyormisiz? 😋❤️


prosmotr kuchaytirish uchun botga qo'shiling
Pullaringizni to'plang va kanal prosmotrini oshiring♥ ️

http://telegram.me/$bot?start=$chatid ",
        ]);
        bot('sendmessage', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Salom aziz do'stim, quyidagi bo'limga xush kelibsiz

Siz do'stlaringizni botga taklif qilinga va
Bepul 10tanga oling

Tepadagi habarni dostingizga yuboring ♥",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "🔙Orqaga qaytish", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "j") {
        date_default_timezone_set('Asia/Dushanbe');
        $date = date('Ymd');
        @$gettime = file_get_contents("data/$chatid/dates.txt");
        if ($gettime == $date) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "ℹSiz kunlik bonusni qabul qilib bo'lgansiz ⏰24soat dan kegin ♻️qayta urinib ko'ring",
                'show_alert' => true
            ]);
        } else {
            file_put_contents("data/$chatid/dates.txt", $date);
            @$sho = file_get_contents("data/$chatid/shoklat.txt");
            $ran = rand(10, 30);
            $getsho = $sho + $ran;
            file_put_contents("data/$chatid/shoklat.txt", $getsho);
            $sho2 = file_get_contents("data/$chatid/shoklat.txt");
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "👤Sizga kunlik bonus sifatida $ran ochko qo'shildi
🚀Umumiy hisobingiz: $sho",
                'show_alert' => true
            ]);
        }
    } elseif ($data == "f") {
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Do'konga xush kelibsiz!

Tanga sotib olish uchun 👇Sotib olish👇admin ga murojat qiling ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "💰Sotib olish", 'url' => "https://t.me/$badmin"]
                    ],
                    [
//Bu kod @PHP_New kanali orqali tarqatildi
                    ],
                    [
//Bu kod @PHP_New kanali orqali tarqatildi
                    ],
                        [
//Bu kod @PHP_New kanali orqali tarqatildi
                    ],
                    [
//Bu kod @PHP_New kanali orqali tarqatildi
                    ],
                ]
            ])
        ]);
    } elseif ($data == "c") {
        @$sho = file_get_contents("data/$chatid/shoklat.txt");
        @$sea = file_get_contents("data/$chatid/membrs.txt");
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "

🆔Raqamingiz: $chatid
   💰Hisobingiz: $sho
    Obunangiz: $sea",
            'show_alert' => true
        ]);
    } elseif ($data == "g") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Yordam bolimidasiz",
            'show_alert' => false
        ]);
        bot('editmessageText', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Variantlardan birini tanlang",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
               [['text' => "📖Qollanma", 'callback_data' => "qol"], ['text' => "Qoida📝", 'callback_data' => "pus"]],
[['text' => "🔙Orqaga qaytish",'callback_data' => "home"]],
                ]
            ])
        ]);
    }elseif ($data == "qol") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "🔖Yordam bolimidasiz",
            'show_alert' => false
        ]);
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Siz bu bot orqali kanalingiz postlarini korish sifatini oshirishingiz mumkun

Buning uchun `Ball ishlash💰` ga bosing va bot kanaliga kiring
Bot kanalidagi har bir post tagidagi `💰Ball olish💰` tugmasini bosib ball yiging

Xisobingiz prosmotir yigish ballari hisobiga yetsa postingizni kanalimizga joylay olasiz

Post joylash uchun `👁Buyurtma` tugmasini bosing va ozingizga keraklisini tanlang va kanalinigizga oyib birorta postni Forword qilib yuborin

Bizda 💰Kunlik bonus💰 ham mavjud har kuni bir marotaba tasodifiy bonis beriladi qancha berishi omadingizga qarab😇

Bizda ozingizni hisobingizni dostingizga sovga qilishingiz ham mumkun buning uchun `🎁Sovg'a` ni bosing va dostingiz ID raqamini yuboring  ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "Qoida📝", 'callback_data' => "pus"]
                    ],
                    [
                        ['text' => "🔙Orqaga qaytish", 'callback_data' => "home"]
                    ]
                ]
            ])
        ]);
    } elseif ($data == "pus") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "📝Qoida bolimidasiz",
            'show_alert' => false
        ]);
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Bizning talab va shatlrtlarimiz bilan tanishib chiqing

1⃣ Har xil Diniy Siyosiy postlarni tashlash mumkun emas

2⃣ Pornografik videolar, ozbekchilikga to'g'ri kelmaydialgan rasmlar

3⃣ Inson ruxiyatiga zarba beruvchi postlar

4⃣ Millatchilikga aloqodor postlar

‼Tashlash qatiyan taqiqlanadi shunday xol kuzatilsa siz va kanalingiz bloklanadi🚫 ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "Qollanma📖", 'callback_data' => "qol"]
                    ],
                    [
                        ['text' => "🔙Orqaga qaytish", 'callback_data' => "home"]
                    ]
                ]
            ])
        ]);
    }

 elseif ($data == "d") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Tanga sovga bolimi",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "for");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Tangaga o'tkazmoqchi bo'lgan foydalanuvchi 🆔raqamini  yuboring",
        ]);
    } elseif ($ali == "for") {
        if ($from_id == $php_new_id) {
            SendMessage($php_new1, "Xabaringizni buzmang! ️‼️");
        } else {
            if (strpos($list, "$php_new_id") !== false) {
                file_put_contents("data/$php_new1/ali.txt", "fore");
                file_put_contents("data/$php_new1/for.txt", $php_new_id);
                bot('sendMessage', [
                    'chat_id' => $php_new1,
                    'text' => "$php_new_id foydalanuvchiga tangalar sonini yuboring ",
                    'reply_markup' => json_encode([
                        'inline_keyboard' => [
                            [
                                ['text' => "🔙Orqaga qaytish🙃", 'callback_data' => "home"]
                            ],
                        ]
                    ])
                ]);
            } else {
                SendMessage($php_new1, "Foydalanuvchi bot azosi emas");
            }
        }
    } elseif ($ali == "fore") {
        if (preg_match('/^([0-9])/', $php_new)) {
            if ($shoklt > $php_new) {
                $fr = file_get_contents("data/$php_new1/for.txt");
                $fle = file_get_contents("data/$fr/shoklat.txt");
                $fl = file_get_contents("data/$php_new1/shoklat.txt");
                $s = $php_new;
                $getsh = $fl - $s;
                file_put_contents("data/$php_new1/shoklat.txt", $getsh);
                SendMessage($php_new1, "Sizning tangalaringiz muvaffaqiyatli kerakli foydalanuvchiga topshirildi.");
                $getshe = $fle + $s;
                file_put_contents("data/$fr/shoklat.txt", $getshe);
                SendMessage($fr, "Tabriklaymiz $php_new1 Sizga $php_new  Tanga xadiya qildi✅");
            } else {
                SendMessage($php_new1, "Sizda etarli mablag ' yo'q; sizda 1💰tanga qolishi kerak.");
            }
        } else {
            SendMessage($php_new1, "Kechirasiz faqat raqam yuboring😶");
        }
    } elseif ($data == "e") {
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Xurmatli foydalanuvchi kanalingiz postini korish kerak bolgan raqamni tanlang✅",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
               [['text' => "10👁", 'callback_data' => "seen10"],['text' => "20👁", 'callback_data' => "seen20"]],
                    [['text' => "45👁", 'callback_data' => "seen45"],['text' => "80👁", 'callback_data' => "seen80"]],
                    [['text' => "100👁", 'callback_data' => "seen100"],['text' => "130👁", 'callback_data' => "seen130"]],
              [['text' => "200👁", 'callback_data' => "seen200"],['text' => "240👁", 'callback_data' => "seen240"]],
                 [['text' => "300👁", 'callback_data' => "seen300"],['text' => "500👁", 'callback_data' => "seen500"]],
              [['text' => "700👁", 'callback_data' => "seen700"],['text' => "1000👁", 'callback_data' => "seen1000"]],
                    [
                        ['text' => "🔙Orqaga qaytish ", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    }
elseif ($data == "seen10") {
        file_put_contents("data/$chatid/ted.txt", "10");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗Ushbu raqamni ro'yxatdan o'tkazish uchun 💰mablag'ingiz yetarli emas.",
                'show_alert' => true
            ]);
        }
    }
        elseif ($data == "seen20") {
        file_put_contents("data/$chatid/ted.txt", "20");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗Ushbu raqamni ro'yxatdan o'tkazish uchun 💰mablag'ingiz yetarli emas.",
                'show_alert' => true
            ]);
        }
    } elseif ($data == "seen45") {
        file_put_contents("data/$chatid/ted.txt", "45");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗Ushbu raqamni ro'yxatdan o'tkazish uchun 💰mablag'ingiz yetarli emas.",
                'show_alert' => true
            ]);
        }
    } elseif ($data == "seen80") {
        file_put_contents("data/$chatid/ted.txt", "80");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗Ushbu raqamni ro'yxatdan o'tkazish uchun 💰mablag'ingiz yetarli emas.",
                'show_alert' => true
            ]);
        }
    } elseif ($data == "seen130") {
        file_put_contents("data/$chatid/ted.txt", "130");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗Ushbu raqamni ro'yxatdan o'tkazish uchun 💰mablag'ingiz yetarli emas.",
                'show_alert' => true
            ]);
        }
    } elseif ($data == "seen240") {
        file_put_contents("data/$chatid/ted.txt", "240");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗Ushbu raqamni ro'yxatdan o'tkazish uchun 💰mablag'ingiz yetarli emas. ",

                'show_alert' => true
            ]);
        }
    }

elseif ($data == "seen100") {
        file_put_contents("data/$chatid/ted.txt", "100");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗Ushbu raqamni ro'yxatdan o'tkazish uchun 💰mablag'ingiz yetarli emas.",
                'show_alert' => true
            ]);
        }
    } elseif ($data == "seen200") {
        file_put_contents("data/$chatid/ted.txt", "200");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗Ushbu raqamni ro'yxatdan o'tkazish uchun 💰mablag'ingiz yetarli emas.",
                'show_alert' => true
            ]);
        }
    } elseif ($data == "seen500") {
        file_put_contents("data/$chatid/ted.txt", "500");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗Ushbu raqamni ro'yxatdan o'tkazish uchun 💰mablag'ingiz yetarli emas.",
                'show_alert' => true
            ]);
        }
    } elseif ($data == "seen700") {
        file_put_contents("data/$chatid/ted.txt", "700");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni kanalingizdan menga forward usulida yuboring✅",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗Ushbu raqamni ro'yxatdan o'tkazish uchun 💰mablag'ingiz yetarli emas. ",

                'show_alert' => true
            ]);
        }
    } elseif ($data == "seen1000") {
        file_put_contents("data/$chatid/ted.txt", "1000");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗Ushbu raqamni ro'yxatdan o'tkazish uchun 💰mablag'ingiz yetarli emas.",
                'show_alert' => true
            ]);
        }
    }

elseif ($data == "seen300") {
        file_put_contents("data/$chatid/ted.txt", "300");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt < $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗Ushbu raqamni ro'yxatdan o'tkazish uchun 💰mablag'ingiz yetarli emas.",
                'show_alert' => true
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        }
    }
      elseif ($ali == "seen2") {
        if ($php_new_username != null) {
            $msg_id = bot('ForwardMessage', [
                'chat_id' => $channel,
                'from_chat_id' => "$php_new1",
                'message_id' => $message_id222
            ])->result->message_id;
               @$al = file_get_contents("data/$php_new1/ted.txt");
            @$sho = file_get_contents("data/$php_new1/shoklat.txt");
            $getsho = $sho - $al;
            file_put_contents("data/$php_new1/shoklat.txt", $getsho);
            @$don = file_get_contents("data/done.txt");
$ran = rand(1, 3);
            $getdon = $don + $ran;
            file_put_contents("data/done.txt", $getdon);
            file_put_contents("ads/cont/$msg_id.txt", $al);
            file_put_contents("ads/date/$msg_id.txt", $fadate);
            file_put_contents("ads/time/$msg_id.txt", $fatime);
            file_put_contents("ads/admin/$msg_id.txt", $php_new1);
            file_put_contents("ads/seen/$msg_id.txt", "0");
            file_put_contents("ads/user/$msg_id.txt", "");
            file_put_contents("data/$php_new1/ali.txt", "no");
            bot('sendMessage', [
                'chat_id' => $channel,
                'text' => "‌👉👉👉💎 $al 💎👈👈👈",
                'reply_to_message_id' => $msg_id,
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                       [
                            ['text' => "💎Ochko ", 'callback_data' => "ok"],['text'=>" ⚙️Shikoyat",'callback_data'=>"spam"],["text"=>"🔙Orqaga","url"=>"https://t.me/$bot"]
                        ],
                    ]
                ])
            ]);
            @$al = file_get_contents("data/$php_new1/ted.txt");
            @$sho = file_get_contents("data/$php_new1/shoklat.txt");
            $getsho = $sho - $al;
            file_put_contents("data/$php_new1/shoklat.txt", $getsho);
            @$don = file_get_contents("data/done.txt");
$ran = rand(1, 3);
            $getdon = $don + $ran;
            file_put_contents("data/done.txt", $getdon);
            file_put_contents("ads/cont/$msg_id.txt", $al);
            file_put_contents("ads/date/$msg_id.txt", $fadate);
            file_put_contents("ads/time/$msg_id.txt", $fatime);
            file_put_contents("ads/admin/$msg_id.txt", $php_new1);
            file_put_contents("ads/seen/$msg_id.txt", "0");
            file_put_contents("ads/user/$msg_id.txt", "");
            file_put_contents("data/$php_new1/ali.txt", "no");
            bot('sendMessage', [
                'chat_id' => $php_new1,
                'text' => "🚀Sizning postingiz [@phpkodlar_baza] kanaliga joylandi tekshirib ko'ring.


  🔎Kuzatuv kodi: $msg_id
  👁Ko'rish raqami: $al
  ⏰ So'rov vaqti: $fatime
  📆Sana: $fadate
  🚀Hozirgi hisobingiz: 💰$sho",
 'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"🚀Tekshirish",'url'=>"https://t.me/phpkodlar_baza/$msg_id"],['text' => "🔙Orqaga qaytish ", 'callback_data' => "home"]
]
]
])
 ]);
}
}else {
            sendmessage($php_new1, "Iltimos, xabarni forword qilib jonating ❗");
        }

    if ($data == "ok") {
        $message_id12 = $update->callback_query->message->reply_to_message->message_id;
        $fromm_id = $update->callback_query->from->id;
        @$ue = file_get_contents("ads/user/$message_id12.txt");
        @$se = file_get_contents("ads/seen/$message_id12.txt");
        if (strpos($ue, "$fromm_id") !== false) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❌Bu postni qabul qilib bo'ldingiz❗",
                'show_alert' => false
            ]);
        } else {
            $user = file_get_contents("ads/user/$message_id12.txt");
            $members = explode("n", $user);
            if (!in_array($fromm_id, $members)) {
                $add_user = file_get_contents("ads/user/$message_id12.txt");
                $add_user .= $fromm_id . "n";
                file_put_contents("ads/user/$message_id12.txt", $add_user);
            }
            $getse = $se + 1;
            file_put_contents("ads/seen/$message_id12.txt", $getse);
            @$sho = file_get_contents("data/$fromm_id/shoklat.txt");
            $getsho = $sho + 1;
            file_put_contents("data/$fromm_id/shoklat.txt", $getsho);
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "🚀+1 ochko qo'shildi umumiy: 💰$sho",
                'show_alert' => false
            ]);
        }
        $end = file_get_contents("ads/seen/$message_id12.txt");
        $ad = file_get_contents("ads/admin/$message_id12.txt");
        $co = file_get_contents("ads/cont/$message_id12.txt");
        $te = file_get_contents("ads/time/$message_id12.txt");
        $de = file_get_contents("ads/date/$message_id12.txt");
        if ($end == $co) {
            file_put_contents("data/$php_new1/ali.txt", "no");
            bot('sendMessage', [
                'chat_id' => $ad,
                'text' => "Sizning buyurtmangiz **$message_id12** yakunlandi

👁 🗨 Siz so'ragan tashriflar soni: $co
So'rov soat: $te
Sana so'rov: $de
So'rov tugashi: $fatme

Siz bilan birgamiz",
                'parse_mode' => "MarkDown"
            ]);
            @$don = file_get_contents("data/done.txt");
            $getdon = $don - 1;
            file_put_contents("data/done.txt", $getdon);
            @$enn = file_get_contents("data/enf.txt");
            $getenf = $enn + 1;
            file_put_contents("data/enf.txt", $getenf);
            $de = $message_id12 + 1;
            deletemessage($channel, $message_id12);
            deletemessage($channel, $de);
            unlink("ads/seen/$message_id12.txt");
            unlink("ads/admin/$message_id12.txt");
            unlink("ads/cont/$message_id12.txt");
            unlink("ads/time/$message_id12.txt");
            unlink("ads/user/$message_id12.txt");
            unlink("ads/date/$message_id12.txt");
        }
    } elseif ($data == "h") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Biroz kuting",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "mlm");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Keyingi kodni yuboring.😀",
        ]);
    }
        else if($data == "spam"){
$message_id12 = $update->callback_query->message->reply_to_message->message_id;
$id = $update->callback_query->from->id;
$name = $update->callback_query->from->first_name;
$block = file_get_contents("data/$id/block-spam.txt");
if($block == true){
 bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "- Bloklanganligi sababli bu haqida xabar berolmaysiz !!",
                'show_alert' => true
            ]);
}else{
bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Hisobot muvaffaqiyatli qabul qilindi!",
                'show_alert' => false
            ]);
file_put_contents("data/spam.txt",$message_id12);
file_put_contents("data/id.txt",$id);

bot('sendMessage',[
 'chat_id'=>"854021271",
  'message_id'=>$message_id,
 'text'=>"[📛](https://T.me/phpkodlar_baza/$message_id12) Уважаемый пользователь admin [$name](tg://user?id=$id) сообщил следующее сообщение .",
 'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"👁Xabar ko'rinishini ko'rsatish",'url'=>"https://t.me/phpkodlar_baza/$message_id12"]
],
[
['text'=>"❌ Yo'q qilish",'callback_data'=>"del spam"],['text'=>"🚫ban",'callback_data'=>"block user"]
]
]
])
 ]);
}
}
elseif($data == "del spam"){
$msg_id = file_get_contents("data/spam.txt");
deletemessage($channel,$msg_id);
deletemessage($channel,$msg_id + 1);
 bot('EditMessageText',[
 'chat_id'=>'854021271',
 'message_id'=>$message_id12,
 'text'=>"Ushbu postni olib tashlang !!",
 ]);
 unlink("data/spam.txt");
  unlink("data/id.txt");

 }
 elseif($data == "block user"){
  $id = file_get_contents("data/id.txt");
 file_put_contents("data/$id/block-spam.txt","true");
 bot('EditMessagetext',[
 'chat_id'=>'854021271',
 'message_id'=>$message_id12,
 'text'=>"siz Istagan foydalanuvchi endi xabar berolmaydi!"
 ]);
  unlink("data/spam.txt");
  unlink("data/id.txt");
 }
elseif ($ali == "mlm") {
        file_put_contents("data/$php_new1/ali.txt", "");
        if (file_exists("ads/admin/$php_new.txt")) {
            $ge = file_get_contents("ads/seen/$php_new.txt");
            $ad = file_get_contents("ads/admin/$php_new.txt");
            $co = file_get_contents("ads/cont/$php_new.txt");
            $te = file_get_contents("ads/time/$php_new.txt");
            $de = file_get_contents("ads/date/$php_new.txt");
            bot('sendMessage', [
                'chat_id' => $php_new1,
                'text' => "$php_new kuzatish uchun kod quyidagicha
👁🗨 Sizning so'ralgan tashrifingiz: $co
⏰Sorov soati: $te
Sorov sanasi: $de
 Siz hozirga qadar topgan prosmotr soni: $ge
🕰 So'rovni bajarilish vaqti: $fatime

Muvaffaqiyatli bo'ling va sharafli bo'ling! ",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ['text' => "🔙Orqaga qaytish", 'callback_data' => "home"]
                        ],
                    ]
                ])
            ]);
        } else {
            bot('sendMessage', [
                'chat_id' => $php_new1,
                'text' => "Sizning amaldagi kod noto'g'ri yoki buyurtma bekor qilindi.",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ['text' => "🔙Orqaga qaytish", 'callback_data' => "home"]
                        ],
                    ]
                ])
            ]);
        }
    }

////----
if ($chatid == $ADMIN or $php_new1 == $ADMIN) {
    if ($php_new == "/panel") {
        file_put_contents("data/$php_new1/ali.txt", "no");
        sendAction($php_new1, 'typing');
        bot('sendmessage', [
            'chat_id' => $php_new1,
            'text' => "ADMIN bolimi😁",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                            ['text' => "♻️Elonlar ro'yhati♻️", 'callback_data' => "am"]
                    ],
                    [
                        ['text' => "Xabar yuborish📤", 'callback_data' => "send"], ['text' => "Forword xabar📧", 'callback_data' => "fwd"]
                    ],
                    [
                        ['text' => "Ban📛", 'callback_data' => "pen"], ['text' => "Unban🔓", 'callback_data' => "unpen"]
                    ],
                    [
                        ['text' => "🎁Sovg'a kodi", 'callback_data' => "crl"],['text' => "Reklama kanalini o'rnatish🆔", 'callback_data' => "setc"]
                    ],
                       [
                        ['text' => "Tanga sovga qilish💰", 'callback_data' => "buy"],['text' => "Sovg'a kanalini ornatish🔆", 'callback_data' => "setc2"]
                    ]
                ]
            ])
        ]);
    } elseif ($data == "am") {
        $user = file_get_contents("users.txt");
        $member_id = explode("n", $user);
        $member_count = count($member_id) - 1;
        @$don = file_get_contents("data/done.txt");
        @$enf = file_get_contents("data/enf.txt");
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Robot a'zolari soni: $member_count
Amaldagi reklamalarning soni: $don
Qilingan reklamalar soni: $enf",

            'show_alert' => true
        ]);
    } elseif ($data == "send") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Kuting...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "send");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Xabaringizni yozing",
        ]);
    } elseif ($ali == "send") {
        file_put_contents("data/$php_new1/ali.txt", "no");
        $fp = fopen("users.txt", 'r');
        while (!feof($fp)) {
            $ckar = fgets($fp);
            sendmessage($ckar, $php_new);
        }
        bot('sendMessage', [
            'chat_id' => $php_new1,
            'text' => "Yuborildi",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "🔙Orqaga qaytish", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "fwd") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Kuting...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "fwd");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Xabaringizni yozing",
        ]);
    } elseif ($ali == 'fwd') {
        file_put_contents("data/$php_new1/ali.txt", "no");
        $forp = fopen("users.txt", 'r');
        while (!feof($forp)) {
            $fakar = fgets($forp);
            Forward($fakar, $php_new1, $message_id);
        }
        bot('sendMessage', [
            'chat_id' => $php_new1,
            'text' => "Yuborildi",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "🔙Orqaga qaytish", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "pen") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Kuting...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "pen");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kerakli foydalanuchi 🆔 ni kiriting",
        ]);
    } elseif ($ali == 'pen') {
        $myfile2 = fopen("data/pen.txt", 'a') or die("Unable to open file!");
        fwrite($myfile2, "$php_newn");
        fclose($myfile2);
        file_put_contents("data/$php_new1/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $php_new1,
            'text' => " Foydalanuvchi bloklandi
 $php_new ",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "🔙Orqaga qaytish", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "unpen") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Kuting...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "unpen");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kerakli foydalanuchi 🆔 ni kiriting",
        ]);
    } elseif ($ali == 'unpen') {
        $newlist = str_replace($php_new, "", $penlist);
        file_put_contents("data/pen.txt", $newlist);
        file_put_contents("data/$php_new1/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $php_new1,
            'text' => "Foydalanuvchi blokdan olindi
 $php_new ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "🔙Orqaga qaytish", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    }
//Bu kod @PHP_New kanali orqali tarqatildi
    elseif ($data == "setc") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Kuting...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "setc");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kanalni kiriting
            Misol uchun: @$bkanal",
        ]);
    } elseif ($ali == 'setc') {
        file_put_contents("data/channel.txt", $php_new);
        file_put_contents("data/$php_new1/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $php_new1,
            'text' => "Kanal kiritildi

 $php_new ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "🔙Orqaga qaytish", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    }
     elseif ($data == "setc2") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Kuting...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "setc2");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kanal kiriting
Misol @$bkanal",
        ]);
    } elseif ($ali == 'setc2') {
        file_put_contents("data/channel2.txt", $php_new);
        file_put_contents("data/$php_new1/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $php_new1,
            'text' => "Kanal kiritildi

 $php_new ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "🔙Orqaga qaytish", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    }
    elseif ($data == "crl") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Kuting...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "crl");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kodni kiriting
Lotin harfida❗️",
        ]);
    } elseif ($ali == 'crl') {
        file_put_contents("data/code.txt", $php_new);
        file_put_contents("data/$php_new1/ali.txt", "crl2");
        bot('sendMessage', [
            'chat_id' => $php_new1,
            'text' => "Tanga miqdorini kiriting",
            'parse_mode' => "MarkDown"
        ]);
    } elseif ($ali == 'crl2') {
        $code = file_get_contents("data/code.txt");
        $code2 = file_get_contents("data/code2.txt");
        file_put_contents("data/code2.txt", $php_new);
        file_put_contents("data/$php_new1/ali.txt", "");
        bot('sendMessage', [
            'chat_id' => $php_new1,
            'text' => "Kod yaratildi",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "🔙Orqaga qaytish", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
               $code = file_get_contents("data/code.txt");
        $code2 = file_get_contents("data/code2.txt");
        bot('sendMessage', [
            'chat_id' => "@$bkanal",
            'text' => " Yangi kod tashkil etilgan.

Kodi🔢: $code
Kodi tangalar soni💰: $code2
⚪ ️Vaqti: $fatime

@Prasmotrbot_robot ga kiring va👇
🎁 Sov'ga kodi bo'limiga kiring va kodni faollashtiring
📄Faqat bir marta koddan foydalanishingiz mumkin tezroq shoshiling❗",
            ]);


   //Bu kod @PHP_New kanali orqali tarqatildi //Bu kod @PHP_New kanali orqali tarqatildi //Bu kod @PHP_New kanali orqali tarqatildi //Bu kod @PHP_New kanali orqali tarqatildi //Bu kod @PHP_New kanali orqali tarqatildi //Bu kod @PHP_New kanali orqali tarqatildi //Bu kod @PHP_New kanali orqali tarqatildi //Bu kod @PHP_New kanali orqali tarqatildi //Bu kod @PHP_New kanali orqali tarqatildi


    }
     elseif ($data == "buy") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Kuting...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "buy");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kerakli 🆔 ni yuboring",
        ]);
    } elseif ($ali == 'buy') {
        file_put_contents("data/buy.txt", $php_new);
        file_put_contents("data/$php_new1/ali.txt", "buy2");
        bot('sendMessage', [
            'chat_id' => $php_new1,
            'text' => "Tanga soni?",
            'parse_mode' => "MarkDown"
        ]);
    } elseif ($ali == 'buy2') {
    $buy = file_get_contents("data/buy.txt");
          $fle = file_get_contents("data/$buy/shoklat.txt");
               $getshe = $fle + $php_new;
                file_put_contents("data/$buy/shoklat.txt", $getshe);
        file_put_contents("data/$php_new1/ali.txt", "");
        bot('sendMessage', [
            'chat_id' => $buy,
            'text' => "Aziz foydalanuvchi
Bot Tomonidan hisobingizga $php_new tangalar qo'shildi.",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "Bosh menyu", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
        bot('sendMessage', [
                    'chat_id' => $php_new1,
            'text' => "Bajarildi😁",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "🔙Orqaga qaytish", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    }
//Bu kod @PHP_New kanali orqali tarqatildi
}
?>
