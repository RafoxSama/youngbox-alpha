<div class="ui grid stackable">

		<div class="sixteen wide column">
	<div class="right m-hidden">
		<div class="blue ui buttons">
			<?php if ($this->Paginator->hasPrev()): ?>
				<?= $this->Paginator->prev('«'); ?>
			<?php endif; ?>
			<?= $this->Paginator->numbers(['modulus' => 5]); ?>
			<?php if ($this->Paginator->hasNext()): ?>
				<?= $this->Paginator->next('»'); ?>
			<?php endif; ?>
		</div>
	</div>
			</div>
</div>
