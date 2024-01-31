using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;

namespace Sessiya
{
    /// <summary>
    /// Interaction logic for Window1.xaml
    /// </summary>
    public partial class Window1 : Window
    {
        public Window1()
        {
            InitializeComponent();
        }

        private void regButton_Click(object sender, RoutedEventArgs e)
        {
            if(fam.Text != "" && name.Text != "" && otch.Text != "" && mail.Text != "" && pass.Text !="" && fam.Text != "Фамилия" && name.Text != "Имя" && otch.Text != "Отчество" && mail.Text != "Почта" && pass.Text != "Пароль")
            {
                if(Validate.IsValidEmail(mail.Text))
                {
                    if(Validate.IsString(name.Text))
                    {
                        if(Validate.IsString(fam.Text))
                        {
                            if(Validate.IsString(otch.Text))
                            {
                                MessageBox.Show("Успешно зарегестрировались");
                            }
                            else
                            {
                                MessageBox.Show("Неверно введено отчество");
                            }
                        }
                        else
                        {
                            MessageBox.Show("Неверно введена фамилия");
                        }
                    }
                    else
                    {
                        MessageBox.Show("Неверно введено имя");
                    }
                }
                else
                {
                    MessageBox.Show("Неверно введена почта");
                }
            }
            else
            {
                MessageBox.Show("Заполните все поля");
            }
        }
    }
}
