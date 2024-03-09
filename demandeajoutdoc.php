<?php
	defined('_JEXEC') or die('Access deny');

	class plgContentDemandeajoutdoc extends JPlugin 
	{
		function onContentPrepare($content, $article, $params, $limit){	
			$document = JFactory::getDocument();
			$document->addStyleSheet('plugins/content/demandeajoutdoc/style.css');
			$re = '/(<!--\s*?)(.*onglet_)(.*)(\s*?-->)/m'; /* Je m'appuie sur la ligne <!--  START onglet_GTU -->  présente sur chacun de mes onglets */
			
			preg_match($re, $article->text, $matches, PREG_OFFSET_CAPTURE);
			echo "<pre>";
			
			$a=$matches[3][0];
			echo $a;
			echo "</pre>";
$subst='<div class="message-demande-ajout-fichier"><a href="mailto:'.$this->params->get('adresemaildestinataire').'?subject=Demander l\'ajout d un fichier à l article onglet '.$a.' de l article '.$article->id.'">'.$this->params->get('messagedestinataire').' </a></div>';
			$article->text = preg_replace($re, $subst, $article->text);
			
		}
	}
