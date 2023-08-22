package CalculateurSimple;
import javax.swing.*;
import java.awt.GridLayout;
import java.awt.FlowLayout;


public class calculatrice {

	public static void main(String[] args) {
	JPanel contenuFenetre =new JPanel();//creation d'un panel
	//FlowLayout disposition = new FlowLayout();
	GridLayout disposition = new GridLayout(4,2);//grie
	contenuFenetre.setLayout(disposition);
	JLabel label1 = new JLabel("Nombre 1 :"); JTextField entrée1 = new JTextField(10);
	JLabel label2 = new JLabel("Nombre 2 :"); JTextField entrée2 = new JTextField(10);
	JLabel label3 = new JLabel("Resultat  :"); JTextField resultat = new JTextField(10);
	JButton lancer =new JButton("+");
	contenuFenetre.add(label1);contenuFenetre.add(entrée1);
	contenuFenetre.add(label2);contenuFenetre.add(entrée2);
	
	contenuFenetre.add(label3);contenuFenetre.add(resultat);
	contenuFenetre.add(lancer);
	JFrame cadre = new JFrame("Ma premiére calculatrice");
	//cadre .setContentPane(contenuFenetre);//ou cadre.add(contenuFenetre);
	cadre.getContentPane().add(contenuFenetre);
	cadre.setSize(400,100);
	cadre .setVisible(true);
	}
}