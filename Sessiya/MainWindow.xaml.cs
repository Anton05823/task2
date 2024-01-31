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
using System.Windows.Navigation;
using System.Windows.Shapes;
using System.Data.SqlClient;
using System.Data;

namespace Sessiya
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();
        }

        private void LoadData()
        {
            try
            {
                DB db = new DB();
                db.openConnection();

                // Создаем SQL SELECT запрос
                string selectSql = "Select Name as Имя, Surname as Фамилия, Otchestvo as Отчество, Data_rojd as [Дата рождения], Number as Номер from Ses_Pacient";

                using (SqlCommand selectCommand = new SqlCommand(selectSql, db.getConnection()))
                using (SqlDataAdapter adapter = new SqlDataAdapter(selectCommand))
                {
                    DataSet m_set = new DataSet();

                    // Заполняем DataSet данными из запроса SELECT
                    adapter.Fill(m_set);

                    // Устанавливаем источник данных для DataGrid
                    Pac.ItemsSource = m_set.Tables[0].DefaultView;
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show("Произошла ошибка: " + ex.Message);
            }
            finally
            {
                DB db = new DB();
                db.closeConnection();
            }
        }

        private void Vrach_Loaded(object sender, RoutedEventArgs e)
        {
            DB db = new DB();
            SqlCommand command = new SqlCommand("Select Name as Имя, Surname as Фамилия, Otchestvo as Отчество, Data_rojd as [Дата рождения], Number as Номер from Ses_Pacient", db.getConnection());
            DataTable dt = new DataTable();
            db.openConnection();
            SqlDataAdapter adapter = new SqlDataAdapter(command);
            adapter.Fill(dt);
            Pac.ItemsSource = dt.DefaultView;
            db.closeConnection();

        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            if (txb_name.Text != "" && txb_surname.Text != "" && txb_otch.Text != "" && txb_number.Text != "" && databith.Text != "Выбор даты" && txb_name.Text != "Имя" && txb_surname.Text != "Фамилия" && txb_otch.Text != "Отчество" && txb_number.Text != "Номер" && databith.Text != "Выбор даты")
            {
                
                    DB db = new DB();
                    DataTable table = new DataTable();

                    SqlCommand command = new SqlCommand("insert into [Ses_Pacient] (Name, Surname, Otchestvo, Data_rojd, Number) values (@name,@sur,@otch, @data, @numb)", db.getConnection());
                    command.Parameters.Add("@name", SqlDbType.VarChar).Value = txb_name.Text;
                    command.Parameters.Add("@sur", SqlDbType.VarChar).Value = txb_surname.Text;
                    command.Parameters.Add("@otch", SqlDbType.VarChar).Value = txb_otch.Text;
                    command.Parameters.Add("@data", SqlDbType.Date).Value = databith.Text;
                    command.Parameters.Add("@numb", SqlDbType.Int).Value = txb_number.Text;
                    

                    db.openConnection();
                    SqlDataAdapter adapter = new SqlDataAdapter(command);
                    command.ExecuteNonQuery();
                    LoadData();
                    db.closeConnection();
                    
             }
               
            
            else
            {
                MessageBox.Show("Заполните все поля");
            }
        }

        private void txb_name_GotFocus(object sender, RoutedEventArgs e)
        {
            txb_name.Text = "";
        }

        private void txb_surname_GotFocus(object sender, RoutedEventArgs e)
        {
            txb_surname.Text = "";
        }

        private void txb_otch_GotFocus(object sender, RoutedEventArgs e)
        {
            txb_otch.Text = "";
        }

        private void txb_number_GotFocus(object sender, RoutedEventArgs e)
        {
            txb_number.Text = "";
        }
    }
}
