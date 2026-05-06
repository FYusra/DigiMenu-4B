#include <GL/freeglut.h>
#include <cmath>

// Sudut rotasi
float sudut = 0.0f;

// Fungsi untuk menggambar
void display() {
    // Bersihkan layar dan depth buffer
    glClear(GL_COLOR_BUFFER_BIT | GL_DEPTH_BUFFER_BIT);
    glLoadIdentity();                   // Reset matriks transformasi

    // Pindahkan objek ke dalam layar (sumbu Z negatif)
    glTranslatef(0.0f, 0.0f, -5.0f);
    glRotatef(sudut, 0.0f, 1.0f, 0.0f); // Rotasi terhadap sumbu Y

    // Gambar segitiga
    glBegin(GL_TRIANGLES);
        glColor3f(1.0f, 0.0f, 0.0f);   // Merah
        glVertex3f(0.0f, 1.0f, 0.0f);
        glColor3f(0.0f, 1.0f, 0.0f);   // Hijau
        glVertex3f(-1.0f, -1.0f, 0.0f);
        glColor3f(0.0f, 0.0f, 1.0f);   // Biru
        glVertex3f(1.0f, -1.0f, 0.0f);
    glEnd();

    glutSwapBuffers();  // Tampilkan hasil rendering (double buffer)
}

// Fungsi untuk update rotasi
void update(int value) {
    sudut += 1.0f;                      // Tambah sudut 1 derajat per frame
    if (sudut > 360.0f) sudut -= 360.0f;

    glutPostRedisplay();                // Minta display() dipanggil lagi
    glutTimerFunc(16, update, 0);       // Panggil update lagi setelah ~16ms (~60 FPS)
}

// Inisialisasi OpenGL
void initOpenGL() {
    glEnable(GL_DEPTH_TEST);            // Aktifkan depth testing
    glClearColor(0.1f, 0.1f, 0.1f, 1.0f); // Warna latar belakang abu-abu gelap
}

// Reshape function (saat ukuran jendela berubah)
void reshape(int w, int h) {
    glViewport(0, 0, w, h);
    glMatrixMode(GL_PROJECTION);
    glLoadIdentity();
    gluPerspective(45.0, (double)w / (double)h, 1.0, 100.0);
    glMatrixMode(GL_MODELVIEW);
}

int main(int argc, char** argv) {
    glutInit(&argc, argv);
    glutInitDisplayMode(GLUT_DOUBLE | GLUT_RGB | GLUT_DEPTH);
    glutInitWindowSize(800, 600);
    glutInitWindowPosition(100, 100);
    glutCreateWindow("Contoh FreeGLUT di VS Code");

    initOpenGL();

    glutDisplayFunc(display);
    glutReshapeFunc(reshape);
    glutTimerFunc(0, update, 0);        // Mulai animasi

    glutMainLoop();                     // Loop utama GLUT
    return 0;
}