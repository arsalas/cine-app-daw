import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { ProfileService } from './profile.service';

@Component({
    selector: 'app-profile',
    templateUrl: './profile.component.html',
    styleUrls: ['./profile.component.css']
})
export class ProfileComponent implements OnInit {

    data: any[] = [];
    imageURL: string = 'https://bulma.io/images/placeholders/128x128.png';
    uploadForm: FormGroup;

    constructor(
        private profileSvc: ProfileService,
        private formBuilder: FormBuilder,
    ) {
        this.uploadForm = this.formBuilder.group({
            avatar: '',
            name: '',
            file: ''
        });
    }

    async ngOnInit(): Promise<void> {
        const response = await this.profileSvc.get()
        this.uploadForm.patchValue({
            name: response.name,
            avatar: response.avatar
        });
        this.imageURL = response.avatar;
    }

    showPreview(event: Event) {
        const file = (event.target as HTMLInputElement).files;
        if (!file || file.length == 0) return
        this.uploadForm.patchValue({
            file: file[0]
        });
        console.log(file[0])
        const reader = new FileReader();
        reader.onload = () => {
            this.imageURL = reader.result as string;
            console.log(1)
        }
        reader.readAsDataURL(file[0])
    }

    onSubmit() {
        console.log(this.uploadForm.value)
        this.profileSvc.update(this.uploadForm.value.name, this.uploadForm.value.avatar, this.uploadForm.value.file)
    }
}
