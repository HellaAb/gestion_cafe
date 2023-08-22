import java.sql.DriverManager; // Charger et configurer le driver de la base de donn�es.
import java.sql.Connection; // R�aliser la connexion et l'authentification � la base de donn�es.
import java.sql.Statement; //  D�finir et ex�cuter la requ�te SQL sur la base de donn�es.
import java.sql.PreparedStatement; // D�finir et ex�cuter la requ�te SQL param�tr�e 
import java.sql.ResultSet; // Parcourir les informations retourn�es par la base de donn�es 
import java.sql.SQLException; // Gestion des exceptions 

public class ExempleJdbc {	
void loadDriver() throws ClassNotFoundException {
	// Class.forName("com.mysql.jdbc.Driver");
	Class.forName("com.mysql.cj.jdbc.Driver");
	}
Connection newConnection() throws SQLException {
	final String url = "jdbc:mysql://localhost/dbessai";
	Connection conn = DriverManager.getConnection(url, "root", "");
	return conn;
	}
public void listPersons() throws SQLException {
	Connection conn = null;
	try {
		// Etape 1: Connexion � la base de donn�es
		conn = newConnection();
		// Etape 2: Cr�ation d'une requ�te SQL de selction des enregistrements
		Statement st = conn.createStatement();
		String RequeteSQLSlection = "SELECT nom,prenom,age FROM personne ORDER BY age";
		// Etape 3: Ex�cution des requ�tes Mise � jour puis selection
		int Age = 55;
		String Nom  = "Chamali";
		int NbEnregistrements = 0;
		String RequeteSQLMiseaJour = "UPDATE personne SET age = "+ Age +"  WHERE nom  = '"+ Nom +"' ";
		System.out.println( "Requ�te de mise � jour:  " +  RequeteSQLMiseaJour );
		NbEnregistrements = st.executeUpdate( RequeteSQLMiseaJour ); // retourne le nombre d'enregistrements mis � jour
		System.out.println( "Nombre enregistrements mis � jour:  " +  NbEnregistrements );
		String   ReqPara = "UPDATE personne SET age = ?  WHERE nom  = ? "; // Requ�te param�tr�e
		Age = 15;  Nom  = "Chamali"; 
		PreparedStatement stmt =conn.prepareStatement( ReqPara);
		stmt.setInt(1, Age); stmt.setString(2, Nom); // Passage des param�tres � la requ�te 
		NbEnregistrements = stmt.executeUpdate(  ); // retourne le nombre d'enregistrements mis � jour
		System.out.println( "Nombre enregistrements mis � jour:  " +  NbEnregistrements );  
		ResultSet rs = st.executeQuery( RequeteSQLSlection ); // retourne l'ensemble des enregistrements selectionn�s
		// Etape 4: Parcours et traitements des r�sultats de la requ�te
		while (rs.next()) {
			String str = "Nom: " + rs.getString(1) +  " Pr�nom: " + rs.getString("prenom") + " Age: " + rs.getInt(3);
			System.out.println( str );
			}
		} 
	finally { 	// Epate 5: fermeture de la connexion � la base de donn�es
				if (conn != null) conn.close();
			}
	}
}




import java.sql.SQLException;

public class Testdb {
	public static void main(String[] Args) {
		ExempleJdbc test = new ExempleJdbc();
		try {
				test.loadDriver();
				test.listPersons();
			} 
		catch (ClassNotFoundException e) {
				System.out.println("Pilote JDBC introuvable!  Message erreur:  " + e.getMessage());
				} 
		catch (SQLException e) {
				System.out.println("SQLException: " + e.getMessage());
				}
		}
	}
    =============================================
    
import javax.swing.*;
import java.awt.GridLayout;
import java.awt.FlowLayout;
import java.awt.BorderLayout;
import java.awt.event.*;

class PanneauAffichage extends JPanel  {
	private JTextField Nombre1, Nombre2, Resultat;
	PanneauAffichage(  ) {
		GridLayout disposition = new GridLayout( 4 , 2 );
		this.setLayout(disposition);
		JLabel L1 = new JLabel ("Nombre 1:  "); Nombre1 = new JTextField( 15);
		JLabel L2 = new JLabel ("Nombre 2:  "); Nombre2 = new JTextField( 15);
		JLabel R = new JLabel ("R�sultat:  ");  Resultat = new JTextField( 15); 
		Resultat.setEditable(false);
		this.add(L1); this.add( Nombre1 );
		this.add(L2); this.add( Nombre2 );
		this.add(R); this.add( Resultat );
	}
	public double getNombre1(  ) {   return( Double.parseDouble( Nombre1.getText() ) ) ; }
	public double getNombre2(  ) {   return( Double.parseDouble( Nombre2.getText() ) ); }
	public void setResultat(  String str) {  Resultat.setText(str); }
}

class Ecouteur implements ActionListener {
	private CalculatriceMenusBis SourceEvent;
	Ecouteur( CalculatriceMenusBis sr ) {SourceEvent = sr ;}
	public  void actionPerformed(ActionEvent e) {
		double v1, v2; 
		JMenuItem ItemSource = (JMenuItem)(e.getSource());
		String str = ItemSource.getText();
		
		if (str.equals("Somme") ) {
			v1 =  SourceEvent.getPanneauAffichage( ).getNombre1(); 
			v2 =  SourceEvent.getPanneauAffichage( ).getNombre2();
			SourceEvent.getPanneauAffichage( ).setResultat( String.valueOf( v1 + v2) ); 
		    }
		if (str.equals("Quitter") ) { System.exit( 0 ); }
			
		}
}