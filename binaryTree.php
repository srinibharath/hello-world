<?php
    class BinaryNode {
        public $key;
        public $left;
        public $right;
    
        public function __construct($key) {
            $this->key =  $key;
            $this->left = null;
            $this->right = null;
        }

        public function inOrderDump() {
            if($this->left !== null) {
                $this->left->inOrderDump();
            }

            print_r($this->key);

            if($this->right !== null) {
                $this->right->inOrderDump();
            }
        }

        public function preOrderDump() {
            print_r($this->key);

            if($this->left !== null) {
                $this->left->preOrderDump();
            }

            if($this->right !== null) {
                $this->right->preOrderDump();
            }
        }

        public function postOrderDump() {
            if($this->right !== null) {
                $this->right->postOrderDump();
            }

            if($this->left !== null) {
                $this->left->postOrderDump();
            }

            print_r($this->key);

        }

    }

    class BinaryTree {
    
        public $root;
    
        public function __construct() {
            $this->root = null;
        }
    
        public function isEmpty() {
            return $this->root == null;
        }
    
        public function insert($value) {
            $node = new BinaryNode($value);
            if($this->isEmpty()) {
                $this->root = $node;
            } else {
                $this->insertNode($node, $this->root);
            }
        }
    
        public function insertNode($node, &$subTree) {
            if($subTree == null) {
                $subTree = $node;
            }
            else {
                if($node->key > $subTree->key) {
                    $this->insertNode($node, $subTree->right);
                }
                else if($node->key < $subTree->key) {
                    $this->insertNode($node, $subTree->left);
                }
                else {
                    // reject duplicates
                }
            }
        }

        public function traverse() {
            $this->root->postOrderDump();
        }
    }

    // create a tree
    $tree = new BinaryTree();

    $tree->insert(10);
    $tree->insert(1);
    $tree->insert(15);

    //var_dump($tree);

    $tree->traverse();
?>
