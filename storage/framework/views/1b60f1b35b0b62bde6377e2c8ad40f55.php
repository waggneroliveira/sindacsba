<?php $__env->startSection('content'); ?>
<style>
    .btn-group.focus-btn-group{
        display: none;
    }
</style>
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('dashboard.title_dashboard')); ?></a></li>
                                <li class="breadcrumb-item active">Lead Contato</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Lead Contato</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table-sortable table table-centered table-nowrap table-striped" id="products-datatable">
                                    <thead>                                        
                                        <tr>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Telefone</th>
                                            <th>Enviado em</th>
                                            <th style="width: 85px;"><?php echo e(__('dashboard.action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $formIndexs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formIndex): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                            
                                            <tr>
                                                <td><?php echo e(isset($formIndex->name)?$formIndex->name:''); ?></td>                                  
                                                <td><?php echo e(isset($formIndex->email)?$formIndex->email:''); ?></td>                                  
                                                <td><?php echo e(isset($formIndex->phone)?$formIndex->phone:''); ?></td>                                  
                                                <td>
                                                    <?php
                                                        $locales = [
                                                            'pt' => 'd/m/Y H:i:s',
                                                            'en' => 'Y-m-d H:i A',          
                                                            'es' => 'Y-m-d H:i A',          

                                                        ];
                                                        $locale = session()->get('locale');
                                                    ?>
                                                        <?php if($formIndex && $formIndex->created_at): ?>
                                                            <?php if(array_key_exists($locale, $locales)): ?>
                                                                <?php echo e($formIndex->created_at->format($locales[$locale])); ?>

                                                                <?php else: ?>
                                                                <?php echo e($formIndex->created_at->format('d/m/Y H:i:s')); ?>

                                                            <?php endif; ?>
                                                            <?php else: ?>
                                                            -
                                                        <?php endif; ?>
                                                </td>
            
                                                <td class="d-flex gap-lg-1 justify-center" style="padding: 18px 15px 0px 0px;">
                                                    <?php if(Auth::user()->hasRole('Super') || 
                                                    Auth::user()->can('usuario.tornar usuario master') || 
                                                    Auth::user()->can('lead contato.visualizar')): ?> 
                                                        <button class="table-edit-button btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-formIndex-<?php echo e($formIndex->id); ?>" style="padding: 2px 8px;width: 30px"><span class="mdi mdi-eye"></span></button>
                                                        <div class="modal fade" id="modal-formIndex-<?php echo e($formIndex->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" style="max-width: 980px;">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-light">
                                                                        <h4 class="modal-title" id="myCenterModalLabel">Lead contato</h4>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                    </div>
                                                                    <div class="modal-body p-4">
                                                                        <div class="row mb-3">
                                                                            <div class="col-12 col-lg-6">
                                                                                <label for="form-label">Nome</label>
                                                                                <input type="text" class="form-control" value="<?php echo e($formIndex->name); ?>" readonly>
                                                                            </div>                                                                   
                                                                            <div class="col-12 col-lg-6">
                                                                                <label for="form-label">E-mail</label>
                                                                                <input type="text" class="form-control" value="<?php echo e($formIndex->email); ?>" readonly>
                                                                            </div>                                                                   
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col-12 col-lg-6">
                                                                                <label for="form-label">Assunto</label>
                                                                                <input type="text" class="form-control" value="<?php echo e(isset($formIndex->subject)?$formIndex->subject:''); ?>" readonly>
                                                                            </div>                                                                   
                                                                            <div class="col-12 col-lg-6">
                                                                                <label for="form-label">Telefone</label>
                                                                                <input type="text" class="form-control" value="<?php echo e($formIndex->phone); ?>" readonly>
                                                                            </div>                                                                   
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="form-label">Texto</label>
                                                                            <div class="bg-white form-control d-flex text-start border" readonly style="height: 150px;max-height:250px;overflow-y:scroll;">
                                                                                <?php echo isset($formIndex->text)?$formIndex->text:''; ?>

                                                                            </div>
                                                                        </div>    
                                                                        <div class="mb-3">
                                                                            <div class="form-check ps-0">
                                                                                <label class="form-check-label" for="invalidCheck">Termo de privacidade:</label>
                                                                                <?php if($formIndex->term_privacy == 1): ?>
                                                                                    <div class="badge bg-success py-1 px-2">
                                                                                        Aceito
                                                                                    </div>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>                                                              
                                                                    </div>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->     
                                                    <?php endif; ?>
                                                    <?php if(Auth::user()->hasRole('Super') || 
                                                    Auth::user()->can('usuario.tornar usuario master') || 
                                                    Auth::user()->can('lead contato.visualizar') &&
                                                    Auth::user()->can('lead contato.remover')): ?>
                                                        <form action="<?php echo e(route('admin.dashboard.formIndex.destroy',['formIndex' => $formIndex->id])); ?>" style="width: 30px" method="POST">
                                                            <?php echo method_field('DELETE'); ?> <?php echo csrf_field(); ?>        
                                                            
                                                            <button type="button" style="width: 30px"class="demo-delete-row btn btn-danger btn-xs btn-icon btSubmitDeleteItem"><i class="fa fa-times"></i></button>
                                                        </form>                                                    
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const editors = ["address_one-1", "address_two-2", "address_three-3"];
    editors.forEach(function(id) {
        if (document.getElementById(id)) {
            CKEDITOR.replace(id);
        }
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.core.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/blades/lead/index.blade.php ENDPATH**/ ?>