</div>
                </div>
            </div>
        </div>
    
    <!-- Javascripts -->
    <script src="<?php echo BASE_URL . 'Assets/plugins/jquery/jquery-3.5.1.min.js'; ?>"></script>
    <script src="<?php echo BASE_URL . 'Assets/plugins/bootstrap/js/bootstrap.min.js'; ?>"></script>
    <script src="<?php echo BASE_URL . 'Assets/plugins/perfectscroll/perfect-scrollbar.min.js'; ?>"></script>
    <script src="<?php echo BASE_URL . 'Assets/plugins/pace/pace.min.js'; ?>"></script>
    <script src="<?php echo BASE_URL . 'Assets/plugins/apexcharts/apexcharts.min.js'; ?>"></script>
    <script src="<?php echo BASE_URL . 'Assets/js/main.min.js'; ?>"></script>
    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
    <?php  if (!empty($data['script'])){?>
    <script src="<?php echo BASE_URL . 'Assets/js/pages/' . $data['script']; ?>"></script>
    <?php }?>
</body>
</html>