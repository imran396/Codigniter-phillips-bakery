$imageurlprefix = base_url().'assets';
$sql = "SELECT
C.cake_id,C.category_id,C.flavour_id,C.title,C.description,C.shape_id As shapes ,C.meta_tag,C.image,C.tiers,
GROUP_CONCAT(G.image ORDER BY G.ordering ASC SEPARATOR ',') as gallery_images
FROM cakes As C
LEFT JOIN cake_gallery AS G
ON ( C.cake_id = G.cake_id )
WHERE C.status =1 && is_deleted != 1 && update_date > $lastdate
GROUP BY C.title";

$updated = $this->db->query($sql)->result_array();

foreach($updated as $key=>$row){
$updated[$key]['cake_id'] = (int) $updated[$key]['cake_id'];
$updated[$key]['category_id'] = (int) $updated[$key]['category_id'];
//$updated[$key]['flavour_id'] = (int) $updated[$key]['flavour_id'];
$updated[$key]['flavour_id'] =  !empty($row['flavour_id']) ? unserialize($row['flavour_id']):array();
$updated[$key]['image'] = !empty($updated[$key]['image']) ? base_url().$updated[$key]['image'] : "";
//$updated[$key]['tiers'] = (int) $updated[$key]['tiers'];
$updated[$key]['tiers'] = array('1');

$updated[$key]['gallery_images'] = explode(',', $row['gallery_images']);
$updated[$key]['gallery_images'] = str_replace('assets',$imageurlprefix,$updated[$key]['gallery_images']);

if(!empty($result[$key]['gallery_images'])){
$updated[$key]['gallery_images'] = explode(',', $row['gallery_images']);
$updated[$key]['gallery_images'] = str_replace('assets',$imageurlprefix,$updated[$key]['gallery_images']);
}else{
$result[$key]['gallery_images'] = array();
}

}