import java.io.*;
import java.net.*;
import psbsm.LineNotify.*;
import java.util.regex.Pattern;

public class demoLine {
	public static void main(String[] args){
		LineNotify myLine = new LineNotify();
		myLine.sendMessage("DGBjuinWhYm0Pp926TDDapECDRdNXh6wT6dJ2lOYcrN",args[0]);
	}
}