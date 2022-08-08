<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php require 'views/header.php'?>

    <main>
        <form action="main/save" class="form" id="form" method="POST">
            <!-- group: Areas-->
            <div class="form__group" id="group__area">
                <label for="area" class="form__label">Areas</label>
                <div class="form__group-input">
                    <select name="area" id="area" class="form__input">
                        <option>--Choose a option--</option>
                        <?php
                        foreach ($this->areas as $value) {
                        ?>
                            <option value="<?= $value['id_area'] ?>"><?= $value['name_area'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- group: Programs-->
            <div class="form__group" id="group__programs">
                <label for="programs" class="form__label">Programs</label>
                <div class="form__group-input">
                    <select name="programs" id="programs" class="form__input" disabled>
                        <option>--Choose a option--</option>
                    </select>
                </div>
            </div>

            <!-- group: Name -->
            <div class="form__group" id="group__name">
                <label for="name" class="form__label">name</label>
                <div class="form__group-input">
                    <input type="text" class="form__input" name="name" id="name" placeholder="John">
                    <i class="form__validate-estate fas fa-times-circle"></i>
                </div>
                <p class="form__input-error">the username must be from 4 to 16 digits and can only contain numbers, letters and underscores.</p>
            </div>

            <!-- group: Last Name -->
            <div class="form__group" id="group__lastname">
                <label for="lastname" class="form__label">Last Name</label>
                <div class="form__group-input">
                    <input type="text" class="form__input" name="lastname" id="lastname" placeholder="Smith">
                    <i class="form__validate-estate fas fa-times-circle"></i>
                </div>
                <p class="form__input-error">The user has to be from 4 to 16 digits and can only contain numbers, letters and underscores.</p>
            </div>

            <!-- group: Email -->
            <div class="form__group" id="group__email">
                <label for="email" class="form__label">Email</label>
                <div class="form__group-input">
                    <input type="email" class="form__input" name="email" id="email" placeholder="email@email.com">
                    <i class="form__validate-estate fas fa-times-circle"></i>
                </div>
                <p class="form__input-error">The email can only contain letters, numbers, periods, hyphens and underscores.</p>
            </div>

            <!-- group: Phone -->
            <div class="form__group" id="group__phone">
                <label for="phone" class="form__label">Phone</label>
                <div class="form__group-input">
                    <input type="text" class="form__input" name="phone" id="phone" placeholder="4491234567">
                    <i class="form__validate-estate fas fa-times-circle"></i>
                </div>
                <p class="form__input-error">The phone can only contain numbers and the maximum is 10 digits.</p>
            </div>

            <!-- group: Country -->
            <div class="form__group" id="group__country">
                <label for="country" class="form__label">Country</label>
                <div class="form__group-input">
                    <select name="country" id="country" class="form__input">
                        <option>--Choose a option--</option>
                        <?php
                        foreach ($this->countries as $value) {
                        ?>
                            <option value="<?= $value['id_country'] ?>"><?= $value['name_country'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <i class="form__validate-estate fas fa-times-circle"></i>
                </div>
            </div>

            <!-- group: State -->
            <div class="form__group" id="group__state">
                <label for="state" class="form__label">State</label>
                <div class="form__group-input">
                    <select name="state" id="state" class="form__input" disabled>
                        <option>--Choose a option--</option>
                    </select>
                    <i class="form__validate-estate fas fa-times-circle"></i>
                </div>
            </div>

            <!-- group: City -->
            <div class="form__group" id="group__city">
                <label for="city" class="form__label">City</label>
                <div class="form__group-input">
                    <select name="city" id="city" class="form__input" disabled>
                        <option>--Choose a option--</option>
                    </select>
                    <i class="form__validate-estate fas fa-times-circle"></i>
                </div>
            </div>

            <!-- group: Comments -->
            <div class="form__group" id="group__comments">
                <label for="comments" class="form__label">comments</label>
                <div class="form__group-input">
                    <textarea name="comments" id="comments" class="form__input input__textarea"></textarea>
                    <i class="form__validate-estate fas fa-times-circle"></i>
                </div>
            </div>

            <!-- group: Terminos y Condiciones -->
            <div class="form__group" id="group__terms">
                <label class="form__label">
					<input class="form__checkbox" type="checkbox" name="terms" id="terms">
					Acepto los Terminos y Condiciones
				</label>
            </div>

            <div class="form__group form__group-btn-enviar">
                <button type="submit" class="form__btn">Enviar</button>
            </div>
        </form>
    </main>

    <?php require 'views/footer.php'?>
</body>
</html>