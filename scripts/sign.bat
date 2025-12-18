@echo off
echo Signing Docker image with Cosign...
docker login -u salimanaim123 -p %3
C:\Cosign\cosign.exe sign --key %1 %2
