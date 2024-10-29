<?php 
$cad = simplexml_load_file('bos/cat/cad/module/data/articles.xml');
// if loading from back-end page:
//$cad = simplexml_load_file('module/data/articles.xml');

// include 'views/topic-list.php';

echo '<div class="articles-wrapper">';
$row = 0;
if($cad->article->count()<=0){echo '<p><strong>[NO ARTICLES]</strong></p>';}else{ 
		foreach($cad->article as $row){ 
			if( (((!empty($row->post['dep'])) && (date('Y-m-d')<=$row->post['dep'])) || ($row->post['dep']=='')) && ($row->post['active']=='true') ){
		?>
		<article data-aid="<?php echo $row['aid'];?>" data-tag="<?php echo $row->post['tag'];?>" data-author="<?php echo $row['user'];?>" data-dip="<?php echo $row->post['dip'];?>">
			<h4 class="title"><?php echo $row->title; ?></h4>
			<div class="tag"><?php echo $row->post['tag'];?></div>
			<?php if(!empty($row->url)){?><a href="<?php echo $row->url;?>" target="<?php echo $row->url['target'];?>"><?php } ?>
			<?php if(($row->pic !='')||(!empty($row->pic))){ ?><div class="cover" style="background-image: url('<?php echo $row->pic;?>');"></div><?php } ?>
			<?php if(!empty($row->url)){?></a><?php } ?>
			<div class="post">Posted by <strong><?php echo $row['user']; ?></strong> on <strong><?php echo $row->post['dip']; ?></strong></div>
			<div class="content">
				<?php echo $row->content; ?>
			</div>
		</article>
<?php } } }
echo '</div>';
?>