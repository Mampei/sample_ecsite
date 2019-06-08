<?php /* Smarty version 2.6.31, created on 2019-06-03 17:03:35
         compiled from search.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'message', 'search.tpl', 45, false),)), $this); ?>
<div class="search">
    <?php if ($this->_tpl_vars['app']['Error'] == 0): ?>
    <div class="container">
        <?php unset($this->_sections['index']);
$this->_sections['index']['name'] = 'index';
$this->_sections['index']['loop'] = is_array($_loop=$this->_tpl_vars['app']['item']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['index']['start'] = (int)$this->_tpl_vars['form']['start'];
$this->_sections['index']['max'] = (int)$this->_tpl_vars['app']['count'];
$this->_sections['index']['show'] = true;
if ($this->_sections['index']['max'] < 0)
    $this->_sections['index']['max'] = $this->_sections['index']['loop'];
$this->_sections['index']['step'] = 1;
if ($this->_sections['index']['start'] < 0)
    $this->_sections['index']['start'] = max($this->_sections['index']['step'] > 0 ? 0 : -1, $this->_sections['index']['loop'] + $this->_sections['index']['start']);
else
    $this->_sections['index']['start'] = min($this->_sections['index']['start'], $this->_sections['index']['step'] > 0 ? $this->_sections['index']['loop'] : $this->_sections['index']['loop']-1);
if ($this->_sections['index']['show']) {
    $this->_sections['index']['total'] = min(ceil(($this->_sections['index']['step'] > 0 ? $this->_sections['index']['loop'] - $this->_sections['index']['start'] : $this->_sections['index']['start']+1)/abs($this->_sections['index']['step'])), $this->_sections['index']['max']);
    if ($this->_sections['index']['total'] == 0)
        $this->_sections['index']['show'] = false;
} else
    $this->_sections['index']['total'] = 0;
if ($this->_sections['index']['show']):

            for ($this->_sections['index']['index'] = $this->_sections['index']['start'], $this->_sections['index']['iteration'] = 1;
                 $this->_sections['index']['iteration'] <= $this->_sections['index']['total'];
                 $this->_sections['index']['index'] += $this->_sections['index']['step'], $this->_sections['index']['iteration']++):
$this->_sections['index']['rownum'] = $this->_sections['index']['iteration'];
$this->_sections['index']['index_prev'] = $this->_sections['index']['index'] - $this->_sections['index']['step'];
$this->_sections['index']['index_next'] = $this->_sections['index']['index'] + $this->_sections['index']['step'];
$this->_sections['index']['first']      = ($this->_sections['index']['iteration'] == 1);
$this->_sections['index']['last']       = ($this->_sections['index']['iteration'] == $this->_sections['index']['total']);
?>
        <div class="item">
            <a class="image" href="?action_search_detail=true&item_id=<?php echo $this->_tpl_vars['app']['item'][$this->_sections['index']['index']][0]; ?>
&name=<?php echo $this->_tpl_vars['app']['item'][$this->_sections['index']['index']][1]; ?>
">
                <img class="item_img" src="<?php echo $this->_tpl_vars['app']['item'][$this->_sections['index']['index']][9]; ?>
">
            </a>
            <p>
                <a class="name" href="?action_search_detail=true&item_id=<?php echo $this->_tpl_vars['app']['item'][$this->_sections['index']['index']][0]; ?>
&name=<?php echo $this->_tpl_vars['app']['item'][$this->_sections['index']['index']][1]; ?>
"><?php echo $this->_tpl_vars['app']['item'][$this->_sections['index']['index']][1]; ?>
</a>
            </p>
            <p>
                <a class="price" href="?action_search_detail=true&item_id=<?php echo $this->_tpl_vars['app']['item'][$this->_sections['index']['index']][0]; ?>
&name=<?php echo $this->_tpl_vars['app']['item'][$this->_sections['index']['index']][1]; ?>
"><span>¥ </span><?php echo $this->_tpl_vars['app']['item'][$this->_sections['index']['index']][6]; ?>
</a>
            </p>
        </div>
        <?php endfor; endif; ?>
    </div>

    <div class="pager">
        <div class="container">
    <?php if ($this->_tpl_vars['app']['hasprev']): ?>
        <a href="<?php echo $this->_tpl_vars['app']['link']; ?>
&start=0">最初</a>&nbsp;<a href="<?php echo $this->_tpl_vars['app']['link']; ?>
&start=<?php echo $this->_tpl_vars['app']['prev']; ?>
">&lt;&lt;</a>
    <?php else: ?>
        最初&nbsp;&lt;&lt;
    <?php endif; ?>
    <?php $_from = $this->_tpl_vars['app']['pager']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
        <?php if ($this->_tpl_vars['page']['offset'] == $this->_tpl_vars['app']['current']): ?>
            <strong><?php echo $this->_tpl_vars['page']['index']; ?>
</strong>
        <?php else: ?>
            <a href="<?php echo $this->_tpl_vars['app']['link']; ?>
&start=<?php echo $this->_tpl_vars['page']['offset']; ?>
"><?php echo $this->_tpl_vars['page']['index']; ?>
</a>
        <?php endif; ?>
        &nbsp;
    <?php endforeach; endif; unset($_from); ?>
    <?php if ($this->_tpl_vars['app']['hasnext']): ?>
        <a href="<?php echo $this->_tpl_vars['app']['link']; ?>
&start=<?php echo $this->_tpl_vars['app']['next']; ?>
">&gt;&gt;</a>
        &nbsp;<a href="<?php echo $this->_tpl_vars['app']['link']; ?>
&start=<?php echo $this->_tpl_vars['app']['last']; ?>
">最後</a>
    <?php else: ?>
        &gt;&gt;&nbsp;最後
    <?php endif; ?>
        </div>
    </div>
</div>

<?php else: ?>
<h1><?php echo smarty_function_message(array('name' => 'itemError'), $this);?>
</h1>
<?php endif; ?>