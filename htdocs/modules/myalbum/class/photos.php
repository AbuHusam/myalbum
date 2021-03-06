<?php

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

include (dirname(dirname(__FILE__))) . '/include/read_configs.php';

/**
 * Class for Blue Room Xcenter
 *
 * @author    Simon Roberts <simon@xoops.org>
 * @copyright copyright (c) 2009-2003 XOOPS.org
 * @package   kernel
 */
class MyalbumPhotos extends XoopsObject
{

    function __construct($id = null)
    {
        $this->initVar('lid', XOBJ_DTYPE_INT, null, false);
        $this->initVar('cid', XOBJ_DTYPE_INT, null, false);
        $this->initVar('title', XOBJ_DTYPE_TXTBOX, null, false, 100);
        $this->initVar('ext', XOBJ_DTYPE_TXTBOX, null, false, 10);
        $this->initVar('res_x', XOBJ_DTYPE_INT, null, false);
        $this->initVar('res_y', XOBJ_DTYPE_INT, null, false);
        $this->initVar('submitter', XOBJ_DTYPE_INT, null, false);
        $this->initVar('status', XOBJ_DTYPE_INT, null, false);
        $this->initVar('date', XOBJ_DTYPE_INT, null, false);
        $this->initVar('hits', XOBJ_DTYPE_INT, null, false);
        $this->initVar('rating', XOBJ_DTYPE_DECIMAL, null, false);
        $this->initVar('votes', XOBJ_DTYPE_INT, null, false);
        $this->initVar('comments', XOBJ_DTYPE_INT, null, false);
        $this->initVar('tags', XOBJ_DTYPE_TXTBOX, null, false, 255);
    }

    function getURL()
    {
        $module_handler = xoops_gethandler('module');
        $config_handler = xoops_gethandler('config');
        if (!isset($GLOBALS['myalbumModule'])) {
            $GLOBALS['myalbumModule'] = $module_handler->getByDirname($mydirname);
        }
        if (!isset($GLOBALS['myalbumModuleConfig'])) {
            $GLOBALS['myalbumModuleConfig'] = $config_handler->getConfigList($GLOBALS['myalbumModule']->getVar('mid'));
        }

        if ($GLOBALS['myalbumModuleConfig']['htaccess']) {
            $cat_handler = xoops_getmodulehandler('cat', $GLOBALS['mydirname']);
            $cat         = $cat_handler->get($this->getVar('cid'));
            $url
                         =
                XOOPS_URL . '/' . $GLOBALS['myalbumModuleConfig']['baseurl'] . '/' . str_replace(
                    array('_', ' ', ')', '(', '&', '#'),
                    '-',
                    $cat->getVar('title')
                ) . '/' . str_replace(array('_', ' ', ')', '(', '&', '#'), '-', $this->getVar('title')) . '/' . $this->getVar('lid') . ','
                . $this->getVar('cid') . $GLOBALS['myalbumModuleConfig']['endofurl'];
        } else {
            $url = $GLOBALS['mod_url'] . "/photo.php?lid=" . $this->getVar('lid') . "&cid=" . $this->getVar('cid');
        }

        return $url;
    }

    function getEditURL()
    {
        $module_handler = xoops_gethandler('module');
        $config_handler = xoops_gethandler('config');
        if (!isset($GLOBALS['myalbumModule'])) {
            $GLOBALS['myalbumModule'] = $module_handler->getByDirname($mydirname);
        }
        if (!isset($GLOBALS['myalbumModuleConfig'])) {
            $GLOBALS['myalbumModuleConfig'] = $config_handler->getConfigList($GLOBALS['myalbumModule']->getVar('mid'));
        }

        if ($GLOBALS['myalbumModuleConfig']['htaccess']) {
            $cat_handler = xoops_getmodulehandler('cat', $GLOBALS['mydirname']);
            $cat         = $cat_handler->get($this->getVar('cid'));
            $url
                         =
                XOOPS_URL . '/' . $GLOBALS['myalbumModuleConfig']['baseurl'] . '/' . str_replace(
                    array('_', ' ', ')', '(', '&', '#'),
                    '-',
                    $cat->getVar('title')
                ) . '/' . str_replace(array('_', ' ', ')', '(', '&', '#'), '-', $this->getVar('title')) . '/edit,' . $this->getVar('lid') . ','
                . $this->getVar('cid') . $GLOBALS['myalbumModuleConfig']['endofurl'];
        } else {
            $url = $GLOBALS['mod_url'] . "/editphoto.php?lid=" . $this->getVar('lid') . "&cid=" . $this->getVar('cid');
        }

        return $url;
    }

    function getRateURL()
    {
        $module_handler = xoops_gethandler('module');
        $config_handler = xoops_gethandler('config');
        if (!isset($GLOBALS['myalbumModule'])) {
            $GLOBALS['myalbumModule'] = $module_handler->getByDirname($mydirname);
        }
        if (!isset($GLOBALS['myalbumModuleConfig'])) {
            $GLOBALS['myalbumModuleConfig'] = $config_handler->getConfigList($GLOBALS['myalbumModule']->getVar('mid'));
        }

        if ($GLOBALS['myalbumModuleConfig']['htaccess']) {
            $cat_handler = xoops_getmodulehandler('cat', $GLOBALS['mydirname']);
            $cat         = $cat_handler->get($this->getVar('cid'));
            $url
                         =
                XOOPS_URL . '/' . $GLOBALS['myalbumModuleConfig']['baseurl'] . '/' . str_replace(
                    array('_', ' ', ')', '(', '&', '#'),
                    '-',
                    $cat->getVar('title')
                ) . '/' . str_replace(array('_', ' ', ')', '(', '&', '#'), '-', $this->getVar('title')) . '/rate,' . $this->getVar('lid') . ','
                . $this->getVar('cid') . $GLOBALS['myalbumModuleConfig']['endofurl'];
        } else {
            $url = $GLOBALS['mod_url'] . "/ratephoto.php?lid=" . $this->getVar('lid') . "&cid=" . $this->getVar('cid');
        }

        return $url;
    }

    function getThumbsURL()
    {
        $module_handler = xoops_gethandler('module');
        $config_handler = xoops_gethandler('config');
        if (!isset($GLOBALS['myalbumModule'])) {
            $GLOBALS['myalbumModule'] = $module_handler->getByDirname($mydirname);
        }
        if (!isset($GLOBALS['myalbumModuleConfig'])) {
            $GLOBALS['myalbumModuleConfig'] = $config_handler->getConfigList($GLOBALS['myalbumModule']->getVar('mid'));
        }

        $url = $GLOBALS['thumbs_url'] . "/" . $this->getVar('lid') . "." . $this->getVar('ext');

        return $url;
    }

    function getPhotoURL()
    {
        $module_handler = xoops_gethandler('module');
        $config_handler = xoops_gethandler('config');
        if (!isset($GLOBALS['myalbumModule'])) {
            $GLOBALS['myalbumModule'] = $module_handler->getByDirname($mydirname);
        }
        if (!isset($GLOBALS['myalbumModuleConfig'])) {
            $GLOBALS['myalbumModuleConfig'] = $config_handler->getConfigList($GLOBALS['myalbumModule']->getVar('mid'));
        }

        $url = $GLOBALS['photos_url'] . "/" . $this->getVar('lid') . "." . $this->getVar('ext');

        return $url;
    }

    function toArray($justVar = false)
    {
        if ($justVar == true) {
            return parent::toArray();
        }

        $catHandler  = xoops_getmodulehandler('cat');
        $textHandler = xoops_getmodulehandler('text');
        $userHandler = xoops_gethandler('user');
//mb    	$statusHandler = xoops_getmodulehandler('status');
        $ret['photo'] = parent::toArray();

        $cat = $catHandler->get($this->getVar('cid'));

        if (is_a($cat, 'MyalbumCat')) {
            $ret['cat'] = $cat->toArray();
        }

        $text = $textHandler->get($this->getVar('lid'));
        if (is_a($text, 'MyalbumText')) {
            $ret['text'] = $text->toArray();
        }

        $user = $userHandler->get($this->getVar('submitter'));
//mb		$ret['status'] = $statusHandler->get($this->getVar('status'));
        $ret['status'] = $this->getVar('status'); //mb
        $ret['user']   = $user->toArray();

        return $ret;
    }

    function increaseHits($value = 1)
    {
        return $GLOBALS['xoopsDB']->queryF(
            "UPDATE " . $GLOBALS['xoopsDB']->prefix($GLOBALS['table_photos']) . " SET hits=hits+" . $value . " WHERE `lid`='" . $this->getVar('lid')
            . "' AND `status` > 0"
        );
    }
}

/**
 * XOOPS policies handler class.
 * This class is responsible for providing data access mechanisms to the data source
 * of XOOPS user class objects.
 *
 * @author  Simon Roberts <simon@chronolabs.coop>
 * @package kernel
 */
class MyalbumPhotosHandler extends XoopsPersistableObjectHandler
{
    var $_table = null;
    var $_dirname = null;

    function __construct(&$db)
    {
        $this->db       = $db;
        $this->_dirname = $GLOBALS['mydirname'];
        $this->_table   = $GLOBALS['table_photos'];
        parent::__construct($db, $this->_table, 'MyalbumPhotos', "lid", "title");
    }

    function setStatus($ids, $status = 1)
    {
        if (empty($ids)) {
            return false;
        }

        if (is_array($ids)) {
            $where = "`lid` IN ('" . implode("','", $ids) . "')";
        } else {
            $where = "`lid` = '$ids'";
        }

        $this->db->query("UPDATE " . $this->db->prefix($this->_table) . " SET `status`='$status' WHERE $where");

        switch ($status) {
            case 1:
                $catHandler = xoops_getmodulehandler('cat', $this->_dirname);
                $cats       = $catHandler->getObjects(null, true);
                // Trigger Notification
                $notification_handler =& xoops_gethandler('notification');
                $criteria             = new Criteria('`lid`', "('" . implode("','", $ids) . "')", 'IN');
                $photos               = $this->getObjects($criteria, true);
                foreach ($photos as $lid => $photo) {
                    $notification_handler->triggerEvent(
                        'global',
                        0,
                        'new_photo',
                        array('PHOTO_TITLE' => $photo->getVar('title'), 'PHOTO_URI' => $photo->getURL())
                    );
                    if ($photo->getVar('title') > 0 && is_object($cats[$photo->getVar('cid')])) {
                        $notification_handler->triggerEvent(
                            'category',
                            $photo->getVar('cid'),
                            'new_photo',
                            array(
                                 'PHOTO_TITLE'    => $photo->getVar('title'),
                                 'CATEGORY_TITLE' => $cats[$photo->getVar('cid')]->getVar('title'),
                                 'PHOTO_URI'      => $photo->getURL()
                            )
                        );
                    }
                }
                break;
        }

        return true;
    }

    function deletePhotos($ids)
    {
        foreach ($ids as $lid) {
            @$this->delete($lid, true);
        }

        return true;
    }

    function delete($photo, $force = true)
    {
        if (is_numeric($photo)) {
            $photo = $this->get($photo);
        }

        if (!is_a($photo, 'MyalbumPhotos')) {
            return false;
        }

        xoops_comment_delete($GLOBALS['myalbum_mid'], $photo->getVar('lid'));
        xoops_notification_deletebyitem($GLOBALS['myalbum_mid'], 'photo', $photo->getVar('lid'));

        unlink($GLOBALS['photos_dir'] . DS . $photo->getVar('lid') . '.' . $photo->getVar('ext'));
        unlink($GLOBALS['photos_dir'] . DS . $photo->getVar('lid') . ".gif");
        unlink($GLOBALS['thumbs_dir'] . DS . $photo->getVar('lid') . '.' . $photo->getVar('ext'));
        unlink($GLOBALS['thumbs_dir'] . DS . $photo->getVar('lid') . ".gif");

        $votedataHandler = xoops_getmodulehandler('votedata', $this->_dirname);
        $textHandler     = xoops_getmodulehandler('text', $this->_dirname);
        $commentsHandler = xoops_getmodulehandler('comments', $this->_dirname);
        $criteria        = new Criteria('`lid`', $photo->getVar('lid'));
        $votedataHandler->deleteAll($criteria, $force);
        $textHandler->deleteAll($criteria, $force);

        return parent::delete($photo, $force);
    }

    function getCountDeadPhotos($criteria = null)
    {
        $objects = $this->getObjects($criteria, true);
        $i       = 0;
        foreach ($objects as $lid => $object) {
            if (!is_readable($GLOBALS['photos_dir'] . DS . $lid . '.' . $object->getVar('ext'))) {
                ++$i;
            }
        }

        return $i;
    }

    function getCountDeadThumbs($criteria = null)
    {
        $objects = $this->getObjects($criteria, true);
        $i       = 0;
        foreach ($objects as $lid => $object) {
            if (!is_readable($GLOBALS['thumbs_dir'] . DS . $lid . '.' . $object->getVar('ext'))) {
                ++$i;
            }
        }

        return $i;
    }

    function getDeadPhotos($criteria = null)
    {
        $objects = $this->getObjects($criteria, true);
        foreach ($objects as $lid => $object) {
            if (is_readable($GLOBALS['photos_dir'] . DS . $lid . '.' . $object->getVar('ext'))) {
                unset($objects[$lid]);
            }
        }

        return $objects;
    }

    function getDeadThumbs($criteria = null)
    {
        $objects = $this->getObjects($criteria, true);
        foreach ($objects as $lid => $object) {
            if (is_readable($GLOBALS['thumbs_dir'] . DS . $lid . '.' . $object->getVar('ext'))) {
                unset($objects[$lid]);
            }
        }

        return $objects;
    }
}

class Myalbum0PhotosHandler extends MyalbumPhotosHandler
{
    function __construct(&$db)
    {
        parent::__construct($db);
    }
}

class Myalbum1PhotosHandler extends MyalbumPhotosHandler
{
    function __construct(&$db)
    {
        parent::__construct($db);
    }
}

class Myalbum2PhotosHandler extends MyalbumPhotosHandler
{
    function __construct(&$db)
    {
        parent::__construct($db);
    }
}
