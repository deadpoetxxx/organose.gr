<?php
// Διαχείριση δημιουργίας νέου συλλόγου

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clubName = trim($_POST['club_name'] ?? '');
    $adminEmail = trim($_POST['admin_email'] ?? '');
    $adminPassword = $_POST['admin_password'] ?? '';
    $phone = trim($_POST['phone'] ?? '');

    if ($clubName && $adminEmail && $adminPassword) {
        $subdomain = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', str_replace(' ', '', $clubName)));
        $sitePath = __DIR__ . '/../sites/' . $subdomain;

        if (file_exists($sitePath)) {
            die("⚠️ Ο σύλλογος ήδη υπάρχει: $subdomain");
        }

        // Δημιουργία φακέλου
        mkdir($sitePath, 0777, true);

        // Αντιγραφή base-site στο νέο φάκελο
        $base = realpath(__DIR__ . '/../base-site');
        shell_exec("cp -r $base/* $sitePath");

        // Δημιουργία αρχείου log
        file_put_contents($sitePath . "/info.txt", "Σύλλογος: $clubName\nEmail: $adminEmail\nΤηλέφωνο: $phone\n");

        // (TODO) Δημιουργία βάσης, wp-config, admin user, αποστολή email

        echo "✅ Ο σύλλογος '$clubName' δημιουργήθηκε στο subdomain: <strong>$subdomain.organose.gr</strong>";
    } else {
        echo "❌ Λείπουν υποχρεωτικά πεδία.";
    }
} else {
    echo "Μη έγκυρη μέθοδος.";
}
