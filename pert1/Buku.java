public class Buku{
	String judul;
	String author;
	int tahun;
	public Buku(){
		this.judul="Java Programming";
		this.author="Agung Sedayu";
		this.tahun=2021;
	}
	public String getJudul() {
		return judul;
	}

	public String getAuthor() {
		return author;
	}

	public int getTahun() {
		return tahun;
	}

	public void setJudul(String judul) {
            this.judul=judul;
	}

	public void setAuthor(String author) {
            this.author=author;
	}

	public void setTahun(int tahun) {
            this.tahun=tahun;
	}

}