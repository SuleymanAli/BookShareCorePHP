<?php if (isset($_SESSION['errorMessage'])): ?>
	<div class="alert alert-danger">
		<?php echo $_SESSION['errorMessage']; ?>
	</div>
	<?php unset($_SESSION['errorMessage']);?>
<?php endif?>

<?php if (isset($_SESSION['successMessage'])): ?>
	<div class="alert alert-success">
		<?php echo $_SESSION['successMessage']; ?>
	</div>
	<?php unset($_SESSION['successMessage']);?>
<?php endif?>

<?php if (isset($_SESSION['warningMessage'])): ?>
	<div class="alert alert-warning">
		<?php echo $_SESSION['warningMessage']; ?>
	</div>
	<?php unset($_SESSION['warningMessage']);?>
<?php endif?>