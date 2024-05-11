<div class=" well ac-ad">
    <h4 class="menu-ac"><strong>Academics & Admission</strong></h4>
    <?php
        //pr($menus);
    ?>
    <?php foreach($menus as $menu): ?>
        <h5 class="menu-acd"><strong><?php echo $menu['Menu']['title']; ?></strong></h5>
        <ul class="widget ac">
        <?php foreach($menu['ChildMenu'] as $childmenu): ?>
            <li>
                <?php
                    $url = '';
                    if($childmenu['type']=='external_link'){
                        $url = $this->Menu->getExternalLink($childmenu['url']);
                    }elseif($childmenu['type']=='file'){
                        $url = $childmenu['file'];
                    }else{
                        $url ='/pages/content_details/'.$childmenu['slug'];
                    }
                    echo $this -> Html -> link($childmenu['title'], "{$url}");                             
                ?>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
</div>
<div class=" well auto">
      <h4 class="menu-aca"><strong>Academic System Automation</strong></h4>
      <form>
      <div class="form-group">
        <label for="exampleInputUserId1">User ID:</label>
        <input class="form-control" id="exampleInputUserId1" placeholder="Enter User ID" type="text">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password:</label>
        <input class="form-control" id="exampleInputPassword1" placeholder="Password" type="password">
      </div>
      <button type="submit" class="btn btn-success">Login</button>
    </form>
</div>
          