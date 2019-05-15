<?php
function generatePassword($str){
    $numChars = strlen($str);

    return substr($str, rand(1, $numChars) - 1, 1);
}

function generatePasswordNew($len, $type){
    $str = '';
    for ($i = 1; $i < $len; $i++) {
        if ($type == 'firstname') $str .= chr(rand(65,69));
        if ($type == 'lastname') $str .= chr(rand(75,79));
    }

    $numChars = strlen($str);

    return substr($str, rand(1, $numChars) - 1, 1);
}


$firstnames = [
    'A' => ['Anniina', 'vowel'],
    'B' => ['Bettina', 'cons'],
    'C' => ['Cecilia', 'cons'],
    'D' => ['Donna', 'cons'],
    'E' => ['Evelina', 'vowel']
];

$lastnames = [
    'K' => ['Karjalainen', 'cons'],
    'L' => ['Laine', 'cons'],
    'M' => ['Manninen', 'cons'],
    'N' => ['Nieminen', 'cons'],
    'O' => ['Oikarinen', 'vowel']
];

$students = [];

foreach ($firstnames as $value) {
    // $keyFirstName = generatePassword('ABCDE');
    // $keyLastName = generatePassword('KLMNO');
    $keyFirstName = generatePasswordNew(5, 'firstname');
    $keyLastName = generatePasswordNew(5, 'lastname');
    if (isset($firstnames[$keyFirstName][0]) && isset($lastnames[$keyLastName][0])) {
        $comment = '';
        switch (true) {
            case ($firstnames[$keyFirstName][1] == 'cons' && $lastnames[$keyLastName][1] == 'cons'):
                $comment = 'Järjestysnro oppilaan nimi on $firstnames[$keyFirstName][1] $lastnames[$keyLastName][1]. Kuulostaa vaikuttavalta!';
                break;

            case ($firstnames[$keyFirstName][1] == 'cons' && $lastnames[$keyLastName][1] == 'vowel'):
                $comment = 'Järjestysnro oppilaan nimi on $firstnames[$keyFirstName][1] $lastnames[$keyLastName][1]. Onpas harvinainen nimi!';
                break;

            case ($firstnames[$keyFirstName][1] == 'vowel' && $lastnames[$keyLastName][1] == 'vowel'):
                $comment = 'Järjestysnro oppilaan nimi on $firstnames[$keyFirstName][1] $lastnames[$keyLastName][1]. Miten kaunis nimi!';
                break;

            case ($firstnames[$keyFirstName][1] == 'vowel' && $lastnames[$keyLastName][1] == 'cons'):
                $comment = 'Järjestysnro oppilaan nimi on $firstnames[$keyFirstName][1] $lastnames[$keyLastName][1]. Hienon kuuloinen nimi.';
                break;
        }


        $students[] = [
            'number' => random_int(1, 50),
            'firstname' => $firstnames[$keyFirstName][0],
            'lastname' => $lastnames[$keyLastName][0],
            'comment' => $comment
        ];
    }
}

echo "<pre>";
print_r($students);
echo "</pre>";

