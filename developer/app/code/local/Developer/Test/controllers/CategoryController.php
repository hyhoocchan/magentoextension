<?php

class Developer_Test_CategoryController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $catId = "3";
        $tree = Mage::getResourceModel('catalog/category_tree');
        /* @var $tree Mage_Catalog_Model_Resource_Category_Tree */
        $nodes = $tree->loadNode($catId)
            ->loadChildren(0)
            ->getChildren();

        $tree->addCollectionData(null, Mage::app()->getStore()->getId(), $catId, true, false);

        $asCollection = $tree->getCollection();
//        echo get_class($asCollection)."<br/>";
//        foreach($asCollection as $item){
//
//            echo "<pre>";
//            print_r($item->debug());
//            echo "</pre>";
//
//        }
        echo "<br/>";
        echo get_class($nodes);
        echo "<br/>";
        /* @var $n Varien_Data_Tree_Node */
        foreach($nodes as $n){

            echo "<pre>";
            print_r($n->getData());
            echo "</pre>";
            echo get_class($n->getChildren())."<br/>";
            if($n->getChildren()){
                foreach($n->getChildren() as $n1){
                    echo get_class($n1);
                    echo "<pre>";
                    print_r($n1->getData());
                    echo "</pre>";
                }
            }
        }
    }

    public function showAction()
    {
    }

   
}