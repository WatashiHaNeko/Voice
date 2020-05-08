<style>
html, body {
  margin: 0;
  color: #1c1c1e;
  font-family: "M PLUS Rounded 1c", sans-serif;
}

a {
  color: inherit;
  text-decoration: none;
}

a:focus {
  outline: none;
}

.button {
  position: relative;
  top: -4px;
  display: block;
  box-sizing: border-box;
  padding: 12px 24px;
  width: 100%;
  line-height: 20px;
  background-color: #34c759;
  background: linear-gradient(0, #34c759 0%, #30d158 50%);
  border: none;
  border-radius: 21px;
  box-shadow: 0 4px 8px 0 #8e8e93;
  color: #ffffff;
  font-size: 20px;
  font-weight: 800;
  text-align: center;
  transition-duration: .2s;
}

.button:hover {
  top: -8px;
  box-shadow: 0 8px 8px 0 #8e8e93;
}

.button:active {
  top: 0;
  box-shadow: 0 0 8px 0 #8e8e93;
}

.button[disabled] {
  top: 0;
  box-shadow: 0 0 8px 0 #8e8e93;
  opacity: 0.5;
}

.button.secondary {
  top: 0;
  padding: 8px 16px;
  line-height: 16px;
  background: transparent;
  border: solid 2px #34c759;
  box-shadow: none;
  color: #34c759;
  font-size: 16px;
}

.button.secondary:hover {
  background: #34c759;
  color: #ffffff;
}

.button.secondary:active {
  transform: scale(0.9);
}

.button.secondary[disabled] {
  opacity: 0.5;
}

.button.danger {
  top: 0;
  padding: 8px 16px;
  line-height: 16px;
  background: transparent;
  border: solid 2px transparent;
  box-shadow: none;
  color: #ff3b30;
  font-size: 16px;
}

.button.danger:hover {
  background: #ff3b30;
  border-color: #ff3b30;
  color: #ffffff;
}

.button.danger:active {
  transform: scale(0.9);
}

.button.danger[disabled] {
  opacity: 0.5;
}

.avatar {
  display: block;
  box-sizing: border-box;
  padding: 4px;
  width: 100%;
  height: 100%;
  background-color: #ffffff;
  border: solid 2px #d1d1d6;
  border-radius: 50%;
  object-fit: cover;
}

.field-container {
  position: relative;
}

.field-label {
  position: absolute;
  top: 8px;
  right: 0;
  left: 0;
  margin: 0 auto;
  line-height: 12px;
  color: #8e8e93;
  font-size: 12px;
  text-align: center;
}

.field {
  display: block;
  box-sizing: border-box;
  padding: 20px 24px 12px;
  width: 100%;
  line-height: 20px;
  background-image: none;
  background: #ffffff;
  border: solid 2px #8e8e93;
  border-radius: 28px;
  text-align: center;
  font-size: 16px;
  font-weight: 800;
  box-shadow: none;
  appearance: none;
  -o-appearance: none;
  -ms-appearance: none;
  -moz-appearance: none;
  -webkit-appearance: none;
}

.field.invalid {
  border-color: #ff3b30;
}

.field.select {
  height: 60px;
  line-height: 24px;
  border-radius: 30px;
}

.field-help {
  margin: 4px 0 0;
  line-height: 18px;
  color: #8e8e93;
  font-size: 12px;
  text-align: center;
}

.field-help.invalid {
  color: #ff3b30;
  font-weight: 800;
}
</style>

