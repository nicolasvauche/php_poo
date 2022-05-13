<?php
require_once 'inc/Models/Message.php';
$messageModel = new Message();
$messages = $messageModel->findAll();
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />

        <title>Liste des messages - PHP POO</title>

        <link rel="stylesheet" href="assets/css/styles.css" />
    </head>
    <body>
        <header class="app-header">
            <h1>Liste des messages</h1>
            <h2>PHP POO</h2>
        </header>

        <main class="app-main">
            <?php if (sizeof($messages) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Date d'envoi</th>
                            <th colspan="2">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($messages as $key => $message): ?>
                            <tr>
                                <td><?php echo $message['id']; ?></td>
                                <td class="text-center">
                                    <?php if ($message['image']): ?>
                                        <img src="assets/img/message/<?php echo $message['image']; ?>" alt="<?php echo $message['name']; ?>">
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $message['name']; ?></td>
                                <td><?php echo $message['email']; ?></td>
                                <td>
                                    <a title="<?php echo $message['message']; ?>" class="info">
                                        <?php echo strlen($message['message']) > 30 ? substr(stripslashes($message['message']), 0, 30) . '…' : stripslashes($message['message']); ?>
                                    </a>
                                </td>
                                <td>
                                    <?php
                                    echo date_format(new \DateTime($message['sent_at']), 'd/m/Y H:i:s');
                                    ?>
                                </td>
                                <td class="text-center">
                                    <a href="modifier.php?id=<?php echo $message['id']; ?>">Modifier</a>
                                </td>
                                <td class="text-center">
                                    <a href="inc/messages.php?mode=delete&id=<?php echo $message['id']; ?>" class="delete">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </main>

        <footer class="app-footer">
            <p>
                <a href="nouveau.php" class="app-button">Ajouter un message</a>
            </p>
        </footer>
    </body>
</html>
