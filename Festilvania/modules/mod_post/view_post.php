<?php

require_once "tampon/view_generic.php";

class ViewPost extends ViewGeneric {

	public function __construct(){
		parent::__construct();
	}

	public function getPost($comments, $event, $rights) {
		$dateBegin = new DateTime($event['date_debut']);
		$dateEnd = new DateTime($event['date_fin']);

		require_once "template_post.php";
	}
	
	public function getComments($comments) {
		if (empty($comments)) {
			echo '	<div class="row mt-3">
						<p class="col-xs-12 col-md-12 text-center">Personne n\'a commenté cet évènement... Soyez le premier !</p>
					<div>';
		}

		foreach ($comments as $key) {
			$date = new DateTime($key['date_creation']);

			echo '<div class="row mt-3">
						<div class="col-lg-2 float-left">
							<img src="' . $key['avatar'] . '" alt="Avatar utilisateur" class="avatar-comment"/>
						</div>
						<div class="col-lg-9">
							<h3> ' . $key['pseudo'] . ' <span id="date-comment">le ' . $date->format('d/m/y') . ' à ' . $date->format('H:i:s') . '</span></h3>
							<p class="text-justify">' . $key['contenu'] . '</p>
						</div>
				</div>';
		}
	}

	public function getEditButton($rights) {
		if ($rights != null && $rights['droit_editer']) {
			return '<a href="index.php?mod=editpost&option=editlistbyid&idEvenement='. $_SESSION['idEvenement'] .'" class="btn btn-dark float-right">Editer</a>';
		}
	}

	public function getCommentForm($rights) {
		if ($rights != null && $rights['droit_commenter']) {
			return '<form class="col-lg-10 mx-auto" action="index.php?mod=post&idEvenement='. $_SESSION['idEvenement'] .'&action=comment" method="post">
						<div class="form-group">
							<textarea class="form-control" placeholder="Commenter..." rows="3" name="comment"></textarea>
							<button type="submit" class="btn btn-success float-right mt-3">Commenter</button>
						</div>
					</form>';
		}
		else {
			return '<p class="col-lg-12 text-center">Vous devez être connecté pour commenter</p>';
		}
	}
    
}

?>
