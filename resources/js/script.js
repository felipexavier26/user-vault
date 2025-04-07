import Swal from 'sweetalert2';

// Alerta de Erros de Validação (global)
if (document.body.dataset.hasErrors === "true") {
    Swal.fire({
        icon: 'error',
        title: 'Erro de validação',
        html: `Essas credenciais não correspondem aos nossos registros.`,
        confirmButtonColor: '#d33',
        confirmButtonText: 'OK'
    });
}

// Alerta de Sucesso (Login, Logout, Registro)
const successMessage = document.body.dataset.successMessage;
if (successMessage) {
    Swal.fire({
        icon: 'success',
        title: 'Sucesso!',
        text: successMessage,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    });
}

// Espera DOM estar carregado para todos os handlers
document.addEventListener('DOMContentLoaded', function () {

    // === LOGIN ===
    if (document.body.dataset.page === 'login') {
        const form = document.querySelector('form');
        const emailInput = document.querySelector('#email');
        const passwordInput = document.querySelector('#password');

        if (form) {
            form.addEventListener('submit', function (e) {
                const email = emailInput.value.trim();
                const password = passwordInput.value.trim();

                if (!email || !password) {
                    e.preventDefault();

                    Swal.fire({
                        icon: 'warning',
                        title: 'Campos obrigatórios',
                        text: 'Por favor, preencha todos os campos antes de continuar.',
                        confirmButtonColor: '#f59e0b',
                        confirmButtonText: 'Entendi'
                    });
                }
            });
        }
    }

    // === REGISTER (CADASTRO) ===
    if (document.body.dataset.page === 'register') {
        const form = document.querySelector('form');
        const nameInput = document.querySelector('#name');
        const emailInput = document.querySelector('#email');
        const passwordInput = document.querySelector('#password');
        const passwordConfirmInput = document.querySelector('#password_confirmation');

        if (form) {
            form.addEventListener('submit', function (e) {
                const name = nameInput.value.trim();
                const email = emailInput.value.trim();
                const password = passwordInput.value.trim();
                const passwordConfirm = passwordConfirmInput.value.trim();

                if (!name || !email || !password || !passwordConfirm) {
                    e.preventDefault();

                    Swal.fire({
                        icon: 'warning',
                        title: 'Campos obrigatórios',
                        text: 'Por favor, preencha todos os campos antes de continuar.',
                        confirmButtonColor: '#f59e0b',
                        confirmButtonText: 'Entendi'
                    });
                    return;
                }

                if (password !== passwordConfirm) {
                    e.preventDefault();

                    Swal.fire({
                        icon: 'error',
                        title: 'Senhas diferentes',
                        text: 'A senha e a confirmação devem ser iguais.',
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'Corrigir'
                    });
                }
            });
        }
    }

    // === FORGOT PASSWORD ===
    if (document.body.dataset.page === 'forgot') {
        const form = document.querySelector('form');
        const emailInput = document.querySelector('#email');

        if (form) {
            form.addEventListener('submit', function (e) {
                const email = emailInput.value.trim();

                if (!email) {
                    e.preventDefault();

                    Swal.fire({
                        icon: 'warning',
                        title: 'Campo obrigatório',
                        text: 'Por favor, informe seu email para redefinir a senha.',
                        confirmButtonColor: '#f59e0b',
                        confirmButtonText: 'Entendi'
                    });
                }
            });
        }
    }


    // === CREATE / EDIT USUÁRIO ===
    const forms = [
        document.querySelector('#form-criar-usuario'),
        document.querySelector('#form-editar-usuario')
    ];

    forms.forEach(form => {
        if (!form) return;

        form.addEventListener('submit', function (e) {
            const nome = document.querySelector('#nome')?.value.trim();
            const email = document.querySelector('#email')?.value.trim();
            const dtNasc = document.querySelector('#dt_nasc')?.value.trim();

            if (!nome || !email || !dtNasc) {
                e.preventDefault();

                Swal.fire({
                    icon: 'warning',
                    title: 'Campos obrigatórios',
                    text: 'Por favor, preencha todos os campos antes de continuar.',
                    confirmButtonColor: '#f59e0b',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});


// === DELETE Admin ===
document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('.form-delete-user');

    forms.forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Tem certeza?',
                text: "Essa ação não poderá ser desfeita!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const body = document.body;

    const passwordUpdated = body.dataset.passwordUpdated === 'true';
    const updatePasswordErrors = JSON.parse(body.dataset.updatePasswordErrors || '{}');

    if (passwordUpdated) {
        Swal.fire({
            icon: 'success',
            title: 'Senha atualizada com sucesso!',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
        });
    }

    if (Object.keys(updatePasswordErrors).length > 0) {
        let errorHtml = '';

        if (updatePasswordErrors.current_password) {
            errorHtml += `<div><strong>Senha atual:</strong><br> A senha está incorreta.'<br>'</div><br>`;
        }

        if (updatePasswordErrors.password) {
            errorHtml += `<div><strong>Nova senha:</strong><br> O campo de senha deve ter pelo menos 8 caracteres <br></div><br>`;
        }

        if (updatePasswordErrors.password_confirmation) {
            errorHtml += `<div><strong>Confirmação:</strong><br> ${updatePasswordErrors.password_confirmation.join('<br>')}</div>`;
        }

        Swal.fire({
            icon: 'error',
            title: 'Erro ao atualizar a senha',
            html: errorHtml,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Corrigir',
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const body = document.body;

    // Perfil atualizado com sucesso
    if (body.dataset.page === 'profile.edit' && body.dataset.successMessage === 'profile-updated') {
        Swal.fire({
            icon: 'success',
            title: 'Perfil atualizado!',
            text: 'Suas informações foram salvas com sucesso.',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    }

    // Erros de validação
    if (body.dataset.page === 'profile.edit' && body.dataset.hasErrors === 'true') {
        Swal.fire({
            icon: 'error',
            title: 'Erro de validação',
            text: 'Verifique os campos preenchidos e tente novamente.',
            confirmButtonColor: '#d33',
            confirmButtonText: 'Corrigir'
        });
    }
});