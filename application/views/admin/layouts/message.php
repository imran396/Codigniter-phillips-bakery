
            <?php if($this->session->flashdata('delete_msg')){?>
            <table class="table table-bordered">

                <tbody>
                <tr>
                    <td>
            <div class="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $this->session->flashdata('duplicate_msg')?>
            </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <?php } ?>
            <?php if($this->session->flashdata('error_msg')){?>
                <table class="table table-bordered">

                    <tbody>
                    <tr>
                        <td>
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $this->session->flashdata('error_msg')?>
            </div>
                </td>
                </tr>
                </tbody>
                </table>
            <?php } ?>

            <?php if($this->session->flashdata('success_msg')){?>
                <table class="table table-bordered">

                    <tbody>
                    <tr>
                        <td>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $this->session->flashdata('success_msg')?>
            </div>
                </td>
                </tr>
                </tbody>
                </table>
            <?php } ?>

            <?php if($this->session->flashdata('warning_msg')){?>
                <table class="table table-bordered">

                    <tbody>
                    <tr>
                        <td>
            <div class="alert alert-block alert-error fade in">
                <?php echo $this->session->flashdata('warning_msg')?>
            </div>
                </td>
                </tr>
                </tbody>
                </table>
            <?php } ?>
