        <ul class="tab">
         <li  <?php if ($this->_var['_curmenu'] == 'make_money'): ?>class="active"  <?php else: ?>class="normal"  <?php endif; ?>><a href="index.php?app=make_money">赚钱系统</a></li>
          <li <?php if ($this->_var['_curmenu'] == 'tuijian_friend'): ?>class="active"  <?php else: ?>class="normal"  <?php endif; ?>><a href="index.php?app=make_money&act=tuijian_friend">推荐的好友</a></li>
           <li <?php if ($this->_var['_curmenu'] == 'record_log'): ?>class="active"  <?php else: ?>class="normal"  <?php endif; ?>><a href="index.php?app=make_money&act=record_log">好友充值记录</a></li>
        </ul>
