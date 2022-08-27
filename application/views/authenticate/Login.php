<div class="row">
    <div class="col-6 m-2 border" class="login">

        <div class="row">
            <div class="col p-2 border-bottom title" onclick="location.href = '/Book/filter/new'"><i class="far fa-clock"></i> ĐĂNG NHẬP</div>
        </div>          

        <div class="row">
            <div class="col p-4">
                <form action="<?php echo $GLOBALS['root_link']; ?>/Authenticate/login" method="POST" class="">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label>Email</label>
                        <input type="email" name="iEmail" id="iEmail" class="form-control" required />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label>Mật khẩu</label>
                        <input type="password" name="iPassword" id="iPassword" class="form-control" required />
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                        <?php if ($data["pageObj"]->getMessageError()): ?>
                            <div id="message" class="bg-danger rounded text-white p-2"><?php echo $data["pageObj"]->getMessageError() ?></div>
                        <?php endif; ?>                                
                        </div>
                    </div>
                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                        <div class="col d-flex justify-content-center">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="iRememberMe" id="iRememberMe" checked />
                                <label class="form-check-label" for="form2Example31"> Hãy ghi nhớ phiên đăng nhập của tôi. </label>
                            </div>
                        </div>

                        <div class="col">
                            <!-- Simple link -->
                            <a href="#!">Bạn quên mật khẩu?</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" name="btnLogin" class="btn btn-primary btn-block mb-4">Đăng nhập</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p class="m-1">Bạn không phải thành viên? <a href="#!">Hãy đăng ký.</a></p>
                        <div class="d-none">
                            <p>or sign up with:</p>
                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-google"></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-twitter"></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-github"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="w-100"></div>

</div>
