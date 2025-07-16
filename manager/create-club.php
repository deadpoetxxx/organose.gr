<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clubName = trim($_POST['club_name'] ?? '');
    $adminEmail = trim($_POST['admin_email'] ?? '');
    $adminPassword = $_POST['admin_password'] ?? '';
    $phone = trim($_POST['phone'] ?? '');

    if ($clubName && $adminEmail && $adminPassword) {
        $slug = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', str_replace(' ', '', $clubName)));
        $clubPath = __DIR__ . '/../clubs/' . $slug;

        if (file_exists($clubPath)) {
            die("⚠️ Ο σύλλογος ήδη υπάρχει: $slug");
        }

        mkdir($clubPath, 0777, true);

        $base = realpath(__DIR__ . '/../base-club');
        shell_exec("cp -r $base/* $clubPath");

        file_put_contents($clubPath . "/info.txt", "Σύλλογος: $clubName\nEmail: $adminEmail\nΤηλέφωνο: $phone\n");

        echo "✅ Ο σύλλογος '$clubName' δημιουργήθηκε στο <a href='/clubs/$slug/' target='_blank'>/clubs/$slug/</a>";
    } else {
        echo "❌ Λείπουν υποχρεωτικά πεδία.";
    }
} else {
    echo "Μη έγκυρη μέθοδος.";
}
