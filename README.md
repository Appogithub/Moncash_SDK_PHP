Pour effectuer un paiement avec Moncash, suivez ces étapes :

Étape 1 : Demande de compte marchand

La première chose à faire est de vous rendre à la Digicel pour demander la création d'un compte marchand, qui vous permettra d'utiliser l'API de Moncash. Assurez-vous de remplir les conditions requises pour obtenir ce compte.

Une fois que vous avez rempli les conditions et que votre compte marchand est approuvé, ils vous enverront un lien pour tester à partir de l'environnement Sandbox.

Notez que lors de cette étape, vous devrez fournir deux informations techniques essentielles :

1. Alert Url : C'est la page vers laquelle l'utilisateur sera redirigé après avoir réussi le paiement et cliqué sur le bouton "Ok".

2. Return Url : C'est la page où les opérations de traitement seront effectuées, notamment la mise à jour de votre base de données après la réussite du paiement.

Assurez-vous d'avoir ces deux pages prêtes sur votre site, par exemple : "alerturl.php" et "returnurl.php".

Étape 2 : Création d'un compte Sandbox

Après avoir obtenu votre compte marchand, vous devez vous rendre sur l'environnement Sandbox pour créer un compte de test. Vous pouvez accéder à la page de création de compte Sandbox en suivant ce lien :

https://sandbox.moncashbutton.digicelgroup.com/Moncash-business/New

Suivez les instructions pour créer votre compte Sandbox. Ensuite, connectez-vous à votre compte de test en suivant ce lien :

https://sandbox.moncashbutton.digicelgroup.com/Moncash-business/Login?environment=test

Étape 3 : Obtention des informations de test

Pour effectuer des tests, vous aurez besoin de deux informations spécifiques. Pour les obtenir, suivez ces étapes :

- Cliquez sur "New" pour créer une entreprise et effectuer les tests.
- Suivez les instructions fournies. 
- Dans l'entreprise de test que vous avez créée, cliquez sur "View," puis sur "Create ClientRestAPI."

Vous y trouverez les informations suivantes :

- Client Id
- Client Secret

Sauvegardez ces informations en lieu sûr.

Étape 4 : Configuration du fichier credentials

Accédez au fichier "credentials" situé dans le dossier moncash. Modifiez la variable "$productionMode" en fonction de votre environnement :

- Mettez "$productionMode" à 0 si vous effectuez des tests à partir de l'environnement Sandbox.
- Mettez "$productionMode" à 1 si vous êtes en mode production.

Ajoutez les informations suivantes au fichier :

$moncashclient = "votre_Client_Id"; // Remplacez par votre Client Id
$moncashsecret = "votre_Client_Secret"; // Remplacez par votre Client Secret

Vous pouvez désormais effectuer vos tests.

Étape 5 : Passer en mode production

Une fois que vous avez l'autorisation pour votre compte marchand Digicel, n'oubliez pas de modifier "$productionMode" en le mettant à 1, et de remplacer les valeurs de "$moncashclient" et "$moncashsecret" par les véritables informations de votre compte marchand.

NB: Je salue le travail accompli par ecelestin pour faciliter l'intégration de Moncash dans un site en PHP. Notamment, je ne fais que compléter son travail. Si vous souhaitez consulter sa version, vous pouvez la trouver sur GitHub à l'adresse suivante : https://github.com/ecelestin/ecelestin-Moncash-sdk-php.